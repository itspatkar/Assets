"""
extractor.py — unified extractor & crawler CLI tool
---------------------------------------------------

Usage examples:
  python extractor.py --target https://example.com --extract urls,emails,secrets
  python extractor.py --target https://example.com --crawl --extract urls,domains,assets --depth 2 --max-pages 100 --strict --quiet --out results.json
"""

import re
import json
import os
import mimetypes
import time
from urllib.parse import urljoin, urlparse
from collections import defaultdict, deque
from typing import Dict
import threading

import requests
from bs4 import BeautifulSoup
import tldextract
import phonenumbers
from requests.adapters import HTTPAdapter
from urllib3.util.retry import Retry
from concurrent.futures import ThreadPoolExecutor, as_completed


# ---------------------------
# Configuration & Patterns
# ---------------------------

DEFAULT_ASSET_PATHS = [
    r"/admin\\b", r"/login\\b", r"/wp-admin\\b", r"/backup\\b", r"/backup\\.sql\\b",
    r"/config\\b", r"/\\.env\\b", r"/wp-content\\b", r"/uploads\\b"
]

SECRET_PATTERNS = {
    "aws_access_key": re.compile(r"AKIA[0-9A-Z]{16}"),
    "aws_secret": re.compile(r"(?i)aws(.{0,20})?(secret|secret_key)[\"'\\s:=]+([A-Za-z0-9/+=]{40})"),
    "google_api_key": re.compile(r"AIza[0-9A-Za-z-_]{35}"),
    "generic_api_key": re.compile(r"(?i)(api|key|token)[\"'\\s:=]{1,5}([A-Za-z0-9\\-\\._]{16,60})"),
    "jwt": re.compile(r"(eyJ[a-zA-Z0-9_\\-]+?\\.[a-zA-Z0-9_\\-]+?\\.[a-zA-Z0-9_\\-]+)"),
    "ssh_private_block": re.compile(r"-----BEGIN (RSA|OPENSSH|DSA|EC) PRIVATE KEY-----[\\s\\S]+?-----END (RSA|OPENSSH|DSA|EC) PRIVATE KEY-----"),
    "pgp_private_block": re.compile(r"-----BEGIN PGP PRIVATE KEY BLOCK-----[\\s\\S]+?-----END PGP PRIVATE KEY BLOCK-----"),
}

EMAIL_REGEX = re.compile(r"[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+")
IPV4_REGEX = re.compile(r"(?:(?:25[0-5]|2[0-4]\\d|[01]?\\d?\\d)(?:\\.|$)){4}")

URL_LIKE_REGEX = re.compile(
    r"""(?xi)
    \\b
    (?:
        (?:https?://|//)
        |
        www\\.
    )
    [\\w.\\-~:/?#[\\]@!$&'()*+,;=%]+
    """
)

MEDIA_EXTENSIONS = (".png", ".jpg", ".jpeg", ".gif", ".bmp", ".pdf", ".docx", ".doc", ".xls", ".xlsx", ".ppt", ".pptx", ".zip", ".rar", ".7z")

DOMAIN_EXTRACT_CACHE: Dict[str, str] = {}


# ---------------------------------
# Network helpers
# ---------------------------------

def make_session(retries=2, backoff=0.3, status_forcelist=(500,502,504), timeout=10):
    session = requests.Session()
    retries = Retry(total=retries, backoff_factor=backoff, status_forcelist=status_forcelist, allowed_methods=False)
    session.mount('http://', HTTPAdapter(max_retries=retries))
    session.mount('https://', HTTPAdapter(max_retries=retries))
    session.request_timeout = timeout
    return session


def fetch_url(url: str, session=None, timeout=10, headers=None, cookies=None, proxies=None, allow_redirects=True):
    if session is None:
        session = make_session(timeout=timeout)
    try:
        resp = session.get(url, headers=headers, cookies=cookies, proxies=proxies, timeout=timeout, allow_redirects=allow_redirects)
        return {
            "status": resp.status_code,
            "headers": dict(resp.headers),
            "content": resp.content,
            "text": resp.text if resp.content else "",
            "url": resp.url,
            "content_type": resp.headers.get("Content-Type", "")
        }
    except Exception as e:
        return {"status": None, "error": str(e), "headers": {}, "content": b"", "text": "", "url": url, "content_type": ""}


# ---------------------------------
# Helper functions
# ---------------------------------

def extract_domains_from_url(url: str):
    if not url: return None
    if url in DOMAIN_EXTRACT_CACHE: return DOMAIN_EXTRACT_CACHE[url]
    parsed = tldextract.extract(url)
    domain = ".".join(part for part in (parsed.domain, parsed.suffix) if part)
    DOMAIN_EXTRACT_CACHE[url] = domain
    return domain


def find_urls_in_text(text: str):
    return set(m.group(0) for m in URL_LIKE_REGEX.finditer(text or ""))


def find_emails(text: str):
    return set(m.group(0) for m in EMAIL_REGEX.finditer(text or ""))


def find_ips(text: str):
    return set(m.group(0) for m in IPV4_REGEX.finditer(text or ""))


def find_phones(text: str, default_region: str = "US"):
    found = set()
    try:
        for match in phonenumbers.PhoneNumberMatcher(text or "", default_region):
            found.add(phonenumbers.format_number(match.number, phonenumbers.PhoneNumberFormat.E164))
    except Exception:
        fallback = re.findall(r"(?:\\+?\\d[\\d\\-\\s\\(\\)]{6,}\\d)", text or "")
        found.update(fallback)
    return found


def find_assets(text: str):
    out = set()
    for p in DEFAULT_ASSET_PATHS:
        for m in re.finditer(p, text or "", flags=re.I):
            out.add(m.group(0))
    return out


def find_media(text: str):
    urls = find_urls_in_text(text)
    return {u for u in urls if u.lower().endswith(MEDIA_EXTENSIONS)}


def find_secrets(text: str, patterns=SECRET_PATTERNS):
    results = defaultdict(list)
    for name, pat in patterns.items():
        for m in pat.finditer(text or ""):
            results[name].append(m.group(0))
    return results


# ---------------------------------
# Extractor Class
# ---------------------------------

class Extractor:
    def __init__(self, extract_types, user_agent=None, cookies=None, proxies=None, retries=2, timeout=10, headers=None, quiet=False):
        self.extract_types = extract_types
        self.session = make_session(retries=retries, timeout=timeout)
        self.session.headers.update({"User-Agent": user_agent or "extractor/1.0"})
        if headers: self.session.headers.update(headers)
        self.cookies, self.proxies, self.timeout = cookies, proxies, timeout
        self.quiet = quiet
        self._lock = threading.Lock()

    def _fetch_and_analyze(self, url):
        resp = fetch_url(url, session=self.session, timeout=self.timeout, cookies=self.cookies, proxies=self.proxies)
        text, base = resp.get("text") or "", resp.get("url") or url
        result = self._analyze_content(text)
        result["_meta"] = {"fetched_url": base, "status": resp.get("status"), "content_type": resp.get("content_type")}
        return result

    def _analyze_content(self, text):
        data = {}
        if "urls" in self.extract_types: data["urls"] = sorted(find_urls_in_text(text))
        if "domains" in self.extract_types: data["domains"] = sorted({extract_domains_from_url(u) for u in find_urls_in_text(text) if u})
        if "ips" in self.extract_types: data["ips"] = sorted(find_ips(text))
        if "emails" in self.extract_types: data["emails"] = sorted(find_emails(text))
        if "phones" in self.extract_types: data["phones"] = sorted(find_phones(text))
        if "assets" in self.extract_types: data["assets"] = sorted(find_assets(text))
        if "media" in self.extract_types: data["media"] = sorted(find_media(text))
        if "secrets" in self.extract_types: data["secrets"] = find_secrets(text)
        return data

    def extract(self, target):
        if os.path.exists(target):
            text = open(target, "r", errors="replace").read()
            res = self._analyze_content(text)
            if not self.quiet: print(json.dumps(res, indent=2))
            return res
        parsed = urlparse(target)
        url = target if parsed.scheme else f"http://{target}"
        result = self._fetch_and_analyze(url)
        if not self.quiet: print(json.dumps(result, indent=2))
        return result

    def crawl(self, start_url, max_depth=2, max_pages=200, strict=True, concurrency=5, delay=0.0):
        parsed = urlparse(start_url)
        if not parsed.scheme: start_url = "http://" + start_url
        start_domain = extract_domains_from_url(start_url)
        visited, results, frontier = set(), {}, deque([(start_url, 0)])

        def should_follow(u, d):
            if not u.startswith("http"): return False
            if d > max_depth or len(visited) >= max_pages: return False
            if strict and extract_domains_from_url(u) != start_domain: return False
            return True

        current_depth = 0
        while frontier:
            batch = [frontier.popleft() for _ in range(len(frontier)) if frontier and frontier[0][1] == current_depth]
            if not batch: current_depth += 1; continue

            with ThreadPoolExecutor(max_workers=concurrency) as ex:
                future_map = {ex.submit(self._fetch_and_analyze, u): u for (u, _) in batch if u not in visited}
                for fut in as_completed(future_map):
                    u = future_map[fut]
                    try: res = fut.result()
                    except Exception as e: res = {"_meta": {"fetched_url": u, "error": str(e)}}
                    with self._lock:
                        visited.add(u)
                        results[u] = res
                    for found in res.get("urls", []):
                        full = urljoin(u, found)
                        if should_follow(full, current_depth+1) and full not in visited:
                            frontier.append((full, current_depth+1))
                    if delay: time.sleep(delay)
            current_depth += 1
            if len(visited) >= max_pages: break

        if not self.quiet:
            print(f"Crawl finished: {len(results)} pages fetched.")
        return results


# ---------------------------------
# CLI Interface
# ---------------------------------

if __name__ == "__main__":
    import argparse
    p = argparse.ArgumentParser(
        description="Extractor — data extraction & crawler tool",
        formatter_class=argparse.RawTextHelpFormatter
    )

    p.add_argument("--target", required=True, help="URL, domain, or file to extract from")
    p.add_argument(
        "--extract",
        required=True,
        help=(
            "Comma-separated data types to extract. Available options:\n"
            "  urls     - Extract all hyperlinks and external URLs\n"
            "  domains  - Extract unique domains/subdomains\n"
            "  ips      - Extract IPv4 addresses\n"
            "  emails   - Extract email addresses\n"
            "  phones   - Extract phone numbers (global format)\n"
            "  assets   - Find sensitive paths like /admin, /login, /backup.sql\n"
            "  media    - Extract links to images, documents, pdfs, etc.\n"
            "  secrets  - Extract API keys, tokens, or private keys\n\n"
            "Example: --extract urls,domains,secrets"
        )
    )
    p.add_argument("--crawl", action="store_true", help="Recursively crawl URLs from the target domain")
    p.add_argument("--depth", type=int, default=2, help="Maximum crawl depth (default: 2)")
    p.add_argument("--max-pages", type=int, default=200, help="Maximum number of pages to crawl (default: 200)")
    p.add_argument("--strict", action="store_true", help="Stay within starting domain (default: True)")
    p.add_argument("--concurrency", type=int, default=5, help="Number of concurrent requests (default: 5)")
    p.add_argument("--delay", type=float, default=0.0, help="Delay between requests per thread (seconds, default: 0.0)")
    p.add_argument("--out", default=None, help="Write JSON output to file (optional)")
    p.add_argument("--quiet", action="store_true", help="Suppress console output (default: False)")

    args = p.parse_args()

    extract_types = set(t.strip().lower() for t in args.extract.split(",") if t.strip())

    ext = Extractor(extract_types=extract_types, quiet=args.quiet)

    if args.crawl:
        data = ext.crawl(args.target, max_depth=args.depth, max_pages=args.max_pages, strict=args.strict, concurrency=args.concurrency, delay=args.delay)
        if args.out: open(args.out, "w").write(json.dumps(data, indent=2))
    else:
        data = ext.extract(args.target)
        if args.out: open(args.out, "w").write(json.dumps(data, indent=2))
