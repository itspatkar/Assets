#!/usr/bin/env python3
"""
Reconit — quick secrets & endpoint reconnaissance.
"""

from __future__ import annotations
import argparse
import re
import sys
import json
import csv
import os
import tempfile
from typing import List, Dict, Any, Tuple, Optional
from urllib.parse import urlparse
import requests

# ----------------------------
# Config / defaults
# ----------------------------
KEYWORDS = ["Authorization", "Basic", "Token", "Public", "Private", "Secret", "Bearer"]

DEFAULT_UA = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
FALLBACK_UA = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0"

# ----------------------------
# Asset wordlist
# ----------------------------
SENSITIVE_PATH_KEYWORDS = [
    "config", "config.json", "settings", "settings.json", ".env", ".env.local", ".env.dev",
    ".env.prod", "config.xml", "settings.xml", "web.config", "app.config", "config.ini",
    "wp-config.php", "configuration", "configuration.json", "config.yaml", "config.yml",
    ".env.bak", ".env.example",
    "service-worker.js", "sw.js", "worker.js", "manifest.json", "app.js", "main.js",
    "bundle.js", "scripts.js", "config.js", "init.js", "serviceworker.js",
    "api", "api/v1", "api/v2", "api/v3", "rest", "rest/v1", "graphql", "api/config",
    "api/settings", "api/users", "api/admin", "api/auth", "api/keys", "api/token",
    "api/v1/config", "api/v1/users", "api/v1/admin", "rest/admin", "rest/config",
    "graphql/admin", "api/debug", "api/status", "api/health",
    "admin", "admin.php", "admin.html", "admin/", "dashboard", "dashboard.php",
    "controlpanel", "cpanel", "admin-panel", "admin/login", "admin/auth", "debug",
    "debug.php", "debug/", "metrics", "METRICS", "actuator", "actuator/health",
    "actuator/env", "admin/config", "admin/settings", "dashboard/admin", "debug/info",
    "trace", "TRACE",
    "backup", "backup.zip", "backup.tar.gz", "backup.sql", "db.sql", "database.sql",
    "site.bak", "backup.bak", "data.zip", "archive.tar", "backup.gz", "site.sql", "db.bak",
    "backup/", "backups/", "data/", "archive/",
    "storage", "files", "s3", "bucket", "storage/", "files/", "s3.amazonaws.com", "s3/",
    "storage/files", "uploads", "uploads/", "public/", "assets/"
]

# ----------------------------
# Patterns
# ----------------------------
_SECRET_PATTERNS: List[Tuple[str, re.Pattern]] = [
    ("JWT", re.compile(r"\beyJ[A-Za-z0-9_-]{10,}\.[A-Za-z0-9\-_]+\.[A-Za-z0-9\-_]+\b")),
    ("AWS Access Key ID", re.compile(r"\bAKIA[0-9A-Z]{16}\b")),
    ("Google API Key", re.compile(r"\bAIza[0-9A-Za-z\-_]{35}\b")),
    ("Stripe Secret Key", re.compile(r"\bsk_live_[0-9a-zA-Z]{24,}\b")),
    ("GitHub PAT", re.compile(r"\bghp_[A-Za-z0-9_]{36}\b")),
    ("Slack Token", re.compile(r"\b(xox[baprs]-[A-Za-z0-9-]{10,})\b")),
    ("Bearer Token", re.compile(r"\bBearer\s+([A-Za-z0-9\-_\.=]{16,})\b", re.I)),
    ("BasicAuth", re.compile(r"\b([A-Za-z0-9._%+\-]{1,64}:[^\s@]{2,64})@([A-Za-z0-9.-]+\.[A-Za-z]{2,})")),
    ("Private Key (PEM)", re.compile(r"-----BEGIN (?:RSA |EC |OPENSSH |)PRIVATE KEY-----[\s\S]{20,}-----END (?:RSA |EC |OPENSSH |)PRIVATE KEY-----")),
    ("Public Key (PEM)", re.compile(r"-----BEGIN PUBLIC KEY-----[\s\S]{20,}-----END PUBLIC KEY-----")),
    ("SSH Public Key", re.compile(r"\bssh-(?:rsa|ed25519|dss) [A-Za-z0-9+/=]{80,}\b")),
    ("Password Assignment", re.compile(
        r"\b(password|passwd|pwd|passphrase|secret|token|auth)\b\s*[:=]\s*(?:['\"]([^\n'\"\\]{6,256})['\"]|([A-Za-z0-9+/=_\-]{16,256}))",
        re.I)),
    ("Email", re.compile(r"\b[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}\b")),
    # phone must start with country code to reduce false positives
    ("Phone", re.compile(r"\+\d{1,3}[-.\s]?\d{6,14}\b")),
]

_ENTROPY_PATTERNS: List[Tuple[str, re.Pattern]] = [
    ("Long Base64 (60+)", re.compile(r"(?<![A-Za-z0-9+/=])([A-Za-z0-9+/]{60,}={0,2})(?![A-Za-z0-9+/=])")),
    ("Hex String (64+)", re.compile(r"\b[0-9a-fA-F]{64,}\b")),
]

_URL_PATTERNS: List[Tuple[str, re.Pattern]] = [
    ("URL", re.compile(r"\bhttps?://[^\s'\"<>()]+")),
    ("IPv4 Address", re.compile(r"\b(?:(?:25[0-5]|2[0-4]\d|1?\d?\d)(?:\.(?:25[0-5]|2[0-4]\d|1?\d?\d)){3})\b")),
    ("IPv6 Address", re.compile(
        r"\b(?:(?:[A-F0-9]{1,4}:){7}[A-F0-9]{1,4}|"
        r"(?:[A-F0-9]{1,4}:){1,7}:|"
        r":(?::[A-F0-9]{1,4}){1,7})\b",
        re.I)),
]

SENSITIVE_FILE_RE = re.compile(r"(?i)\b(?:" + "|".join(re.escape(p) for p in SENSITIVE_PATH_KEYWORDS) + r")\b")
_PATH_PATTERNS: List[Tuple[str, re.Pattern]] = [
    ("Web Path", re.compile(r"(?:(?<!https://)(?<!http://)/[A-Za-z0-9_\-./]{3,})")),
    ("Unix Path", re.compile(r"(?:(?:\.\./)|(?:/))(?:[A-Za-z0-9._\-/]{3,})")),
    ("Windows Path", re.compile(r"(?:[A-Za-z]:\\[A-Za-z0-9_.\\\-]{3,}|\\\\[A-Za-z0-9_.\\\-]{3,})")),
    ("Sensitive File/Path/Endpoint", SENSITIVE_FILE_RE),
]

_DEFAULT_PATTERNS = _SECRET_PATTERNS + _URL_PATTERNS

_KEYWORD_ASSIGN_RE = re.compile(
    r"\b(?:" + "|".join(re.escape(k) for k in KEYWORDS) + r")\b\s*[:=]|Authorization\s+|Bearer\s+",
    re.I
)

# ----------------------------
# Helpers: URL detection & normalization
# ----------------------------
DOMAIN_LIKE_RE = re.compile(r"^(?:[\w-]+\.)+[a-z]{2,}(?:[/:?].*)?$", re.I)


def looks_like_domain(s: str) -> bool:
    return bool(DOMAIN_LIKE_RE.match(s))


def ensure_url(target: str) -> str:
    if re.match(r"^https?://", target, re.I):
        return target
    return "https://" + target


# ----------------------------
# Fetching with resilience (UA fallback, retries, headers, cookies, proxy)
# ----------------------------
def build_session(user_agent: str, extra_headers: List[str], cookies: List[str], cookie_file: Optional[str], proxy: Optional[str]) -> requests.Session:
    s = requests.Session()
    headers = {
        "User-Agent": user_agent,
        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Accept-Language": "en-US,en;q=0.9",
        "Connection": "close",
    }
    for h in extra_headers:
        if ":" in h:
            name, val = h.split(":", 1)
            headers[name.strip()] = val.strip()
    s.headers.update(headers)

    for c in cookies:
        if "=" in c:
            name, val = c.split("=", 1)
            s.cookies.set(name.strip(), val.strip())

    if cookie_file:
        try:
            with open(cookie_file, "r", encoding="utf-8") as fh:
                for ln in fh:
                    ln = ln.strip()
                    if not ln or ln.startswith("#"):
                        continue
                    if "=" in ln:
                        name, val = ln.split("=", 1)
                        s.cookies.set(name.strip(), val.strip())
        except Exception:
            pass

    if proxy:
        s.proxies.update({"http": proxy, "https": proxy})

    return s


def fetch_with_retries(session: requests.Session, url: str, retries: int, timeout: int, fetch_debug: bool, allow_auto_ua_fallback: bool = True) -> Optional[Tuple[str, str]]:
    """
    Try to fetch URL with session. Returns (final_url, content) on success, else None.
    Retries count is additional attempts beyond the first; UA-fallback tries once if 403.
    """
    attempt = 0
    last_exc = None
    original_headers = dict(session.headers)
    while attempt <= retries:
        try:
            resp = session.get(url, timeout=timeout, allow_redirects=True)
            if fetch_debug:
                print(f"[fetch-debug] attempt={attempt+1} status={resp.status_code} url={resp.url}", file=sys.stderr)
            if 200 <= resp.status_code < 300:
                return (resp.url, resp.text)
            if resp.status_code == 403 and allow_auto_ua_fallback and session.headers.get("User-Agent") != FALLBACK_UA:
                if fetch_debug:
                    print("[fetch-debug] received 403 — retrying with fallback UA", file=sys.stderr)
                session.headers["User-Agent"] = FALLBACK_UA
                attempt += 1
                continue
            last_exc = Exception(f"HTTP {resp.status_code} for url: {url}")
            if fetch_debug:
                # show some response headers for debugging
                try:
                    hdrs = dict(resp.headers)
                    print(f"[fetch-debug] response-headers: {hdrs}", file=sys.stderr)
                except Exception:
                    pass
            attempt += 1
            continue
        except requests.RequestException as e:
            last_exc = e
            if fetch_debug:
                print(f"[fetch-debug] request exception: {e}", file=sys.stderr)
            attempt += 1
            continue
    # restore headers
    session.headers.update(original_headers)
    if fetch_debug and last_exc:
        print(f"[fetch-debug] final failure: {last_exc}", file=sys.stderr)
    return None


# ----------------------------
# File reading & context helpers
# ----------------------------
def read_file(path: str) -> str:
    with open(path, "rb") as f:
        raw = f.read()
    for enc in ("utf-8", "latin-1", "utf-16"):
        try:
            return raw.decode(enc)
        except Exception:
            continue
    return raw.decode(errors="replace")


def get_context_line(line: str, start: int, end: int, ctx: int = 60) -> str:
    s = max(0, start - ctx)
    e = min(len(line), end + ctx)
    fragment = line[s:e].strip()
    if s > 0:
        fragment = "..." + fragment
    if e < len(line):
        fragment = fragment + "..."
    return fragment


# ----------------------------
# Scanning core
# ----------------------------
def build_patterns(scan_urls: bool, scan_secrets: bool, scan_assets: bool, scan_entropy: bool) -> List[Tuple[str, re.Pattern]]:
    if not (scan_urls or scan_secrets or scan_assets or scan_entropy):
        return list(_DEFAULT_PATTERNS)
    patterns: List[Tuple[str, re.Pattern]] = []
    if scan_secrets:
        patterns += _SECRET_PATTERNS
    if scan_urls:
        patterns += _URL_PATTERNS
    if scan_assets:
        patterns += _PATH_PATTERNS
    if scan_entropy:
        patterns += _ENTROPY_PATTERNS
    return patterns


def scan_text(source_name: str, text: str, patterns: List[Tuple[str, re.Pattern]]) -> List[Dict[str, Any]]:
    findings: List[Dict[str, Any]] = []
    seen = set()
    lines = text.splitlines()
    for lineno, line in enumerate(lines, start=1):
        for patt_name, patt in patterns:
            for m in patt.finditer(line):
                raw = m.group(0)
                if len(raw.strip()) < 3:
                    continue
                if patt_name == "Web Path":
                    start_idx = m.start()
                    prefix = line[max(0, start_idx - 8):start_idx].lower()
                    if "http" in prefix:
                        continue
                key = (source_name, lineno, patt_name, raw)
                if key in seen:
                    continue
                seen.add(key)
                ctx = get_context_line(line, m.start(), m.end())
                findings.append({
                    "source": source_name,
                    "line": lineno,
                    "type": patt_name,
                    "match": raw,
                    "raw": raw,
                    "context": ctx
                })
        # keyword-only reveal (assignment / auth usage)
        if _KEYWORD_ASSIGN_RE.search(line):
            if not any(f["source"] == source_name and f["line"] == lineno for f in findings):
                snippet = line.strip()
                if len(snippet) > 10:
                    findings.append({
                        "source": source_name,
                        "line": lineno,
                        "type": "KeywordMention",
                        "match": snippet,
                        "raw": snippet,
                        "context": snippet
                    })
    return findings


# ----------------------------
# CLI / Orchestration
# ----------------------------
def build_argparser() -> argparse.ArgumentParser:
    p = argparse.ArgumentParser(prog="reconit", description="Reconit — quick secrets & endpoint reconnaissance")
    p.add_argument("targets", nargs="+", help="File paths or URLs to scan (plain domains like example.com are auto-detected).")
    p.add_argument("--scan-urls", action="store_true", help="Scan only URLs and IP addresses.")
    p.add_argument("--scan-secrets", action="store_true", help="Scan only secrets (keys, tokens, creds, emails, phones).")
    p.add_argument("--scan-assets", action="store_true", help="Scan only asset paths, files, and endpoints (uses wordlist).")
    p.add_argument("--scan-entropy", action="store_true", help="Scan for long Base64 or hex strings (high-entropy data).")
    p.add_argument("--user-agent", metavar="UA", help="Override User-Agent used for fetches.")
    p.add_argument("--header", action="append", default=[], help="Extra header to send with fetches. Repeatable: --header 'Name: Value'")
    p.add_argument("--cookie", action="append", default=[], help="Cookie to send (name=value). Repeatable.")
    p.add_argument("--cookie-file", help="File containing cookies (name=value per line).")
    p.add_argument("--proxy", help="Proxy URL, e.g. http://127.0.0.1:8080")
    p.add_argument("--retries", type=int, default=1, help="Number of retry attempts (on top of the first request).")
    p.add_argument("--timeout", type=int, default=15, help="HTTP timeout seconds when fetching URLs.")
    p.add_argument("--fetch-debug", action="store_true", help="Print fetch debug info to stderr (works even if --quiet).")
    p.add_argument("--json", action="store_true", help="Output results as JSON to stdout (or to file when -o/--quiet used).")
    p.add_argument("--csv", metavar="CSVFILE", help="Write CSV to this file.")
    p.add_argument("-o", "--output", metavar="FILE", help="Write plain output to FILE (overrides --quiet default filename).")
    p.add_argument("--quiet", action="store_true", help="No console output; saves results to reconit_output.txt (or to -o if provided).")
    return p


def main(argv=None):
    args = build_argparser().parse_args(argv)

    patterns = build_patterns(args.scan_urls, args.scan_secrets, args.scan_assets, args.scan_entropy)

    ua = args.user_agent if args.user_agent else DEFAULT_UA
    session = build_session(ua, args.header, args.cookie, args.cookie_file, args.proxy)

    all_findings: List[Dict[str, Any]] = []
    temp_files: List[str] = []

    for raw_target in args.targets:
        is_remote = False
        fetch_url = raw_target

        if looks_like_domain(raw_target) and not re.match(r"^https?://", raw_target, re.I):
            is_remote = True
            fetch_url = ensure_url(raw_target)
        elif re.match(r"^https?://", raw_target, re.I):
            is_remote = True
            fetch_url = raw_target
        else:
            if not os.path.isfile(raw_target):
                if looks_like_domain(raw_target):
                    is_remote = True
                    fetch_url = ensure_url(raw_target)
                else:
                    print(f"[!] Invalid file: {raw_target}", file=sys.stderr)
                    continue

        if is_remote:
            if args.fetch_debug:
                print(f"[fetch-debug] fetching {fetch_url} with UA: {session.headers.get('User-Agent')}", file=sys.stderr)
            fetched = fetch_with_retries(session, fetch_url, retries=args.retries, timeout=args.timeout, fetch_debug=args.fetch_debug)
            if not fetched:
                print(f"[!] Failed to fetch {fetch_url}", file=sys.stderr)
                continue
            final_url, content = fetched
            # write content to temp file for scanning
            tmp = tempfile.NamedTemporaryFile(delete=False, suffix=".html")
            try:
                tmp.write(content.encode("utf-8", errors="replace"))
                tmp.close()
                temp_files.append(tmp.name)
                text = read_file(tmp.name)
                source_name = raw_target  # keep user-supplied form for grouping
                findings = scan_text(source_name, text, patterns)
            except Exception as e:
                print(f"[!] Error processing fetched content from {fetch_url}: {e}", file=sys.stderr)
                continue
        else:
            source_name = raw_target
            try:
                text = read_file(raw_target)
            except Exception as e:
                print(f"[!] Could not read {raw_target}: {e}", file=sys.stderr)
                continue
            findings = scan_text(source_name, text, patterns)

        all_findings.extend(findings)

    # cleanup temps
    for t in temp_files:
        try:
            os.remove(t)
        except Exception:
            pass

    all_findings.sort(key=lambda x: (x.get("source", ""), int(x.get("line", 0))))

    # Group by source for pretty printing
    grouped: Dict[str, List[Dict[str, Any]]] = {}
    for f in all_findings:
        grouped.setdefault(f["source"], []).append(f)

    # Determine output file rules:
    # - If -o provided -> use that file
    # - Else if --quiet -> reconit_output.txt
    # - Else -> no file (default behavior prints to console only)
    output_file: Optional[str] = None
    if args.output:
        output_file = args.output
    elif args.quiet:
        output_file = "reconit_output.txt"

    # JSON handling
    if args.json:
        out_data = json.dumps(all_findings, indent=2, ensure_ascii=False)
        if output_file:
            try:
                with open(output_file, "w", encoding="utf-8") as fh:
                    fh.write(out_data)
            except Exception as e:
                print(f"[!] Failed to write output file {output_file}: {e}", file=sys.stderr)
        elif not args.quiet:
            print(out_data)
    else:
        # Human readable grouped output
        if not args.quiet:
            for src, items in grouped.items():
                print(f"\n────────── [{src}] ──────────")
                for f in items:
                    print(f"line {f['line']} : {f['type']} : {f['raw']}")
            print(f"\n[+] Reconit done. {len(all_findings)} total findings.")
        if output_file:
            try:
                with open(output_file, "w", encoding="utf-8") as fh:
                    for f in all_findings:
                        fh.write(f"[{f['source']}] line {f['line']} : {f['type']} : {f['raw']}\n")
            except Exception as e:
                print(f"[!] Failed to write output file {output_file}: {e}", file=sys.stderr)

    # CSV export (optional)
    if args.csv:
        try:
            keys = ["source", "line", "type", "raw", "context"]
            with open(args.csv, "w", newline="", encoding="utf-8") as csvf:
                w = csv.DictWriter(csvf, fieldnames=keys)
                w.writeheader()
                for f in all_findings:
                    w.writerow({k: f.get(k, "") for k in keys})
            if not args.quiet:
                print(f"[+] Wrote CSV → {args.csv}")
        except Exception as e:
            print(f"[!] CSV write failed: {e}", file=sys.stderr)


if __name__ == "__main__":
    main()
