#!/usr/bin/env python3
"""
Reconit — quick secrets & endpoint reconnaissance for files or URLs.
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
# Config / keywords
# ----------------------------
KEYWORDS = ["Authorization", "Basic", "Token", "Public", "Private", "Secret", "Bearer"]
USER_AGENT = "reconit"

# ----------------------------
# File & Path Sensitive Wordlist
# ----------------------------
SENSITIVE_PATH_KEYWORDS = [
    # Config files
    "config", "config.json", "settings", "settings.json", ".env", ".env.local", ".env.dev",
    ".env.prod", "config.xml", "settings.xml", "web.config", "app.config", "config.ini",
    "wp-config.php", "configuration", "configuration.json", "config.yaml", "config.yml",
    ".env.bak", ".env.example",
    # JS / Service worker
    "service-worker.js", "sw.js", "worker.js", "manifest.json", "app.js", "main.js",
    "bundle.js", "scripts.js", "config.js", "init.js", "serviceworker.js",
    # API endpoints
    "api", "api/v1", "api/v2", "api/v3", "rest", "rest/v1", "graphql", "api/config",
    "api/settings", "api/users", "api/admin", "api/auth", "api/keys", "api/token",
    "api/v1/config", "api/v1/users", "api/v1/admin", "rest/admin", "rest/config",
    "graphql/admin", "api/debug", "api/status", "api/health",
    # Admin & Debug
    "admin", "admin.php", "admin.html", "admin/", "dashboard", "dashboard.php",
    "controlpanel", "cpanel", "admin-panel", "admin/login", "admin/auth", "debug",
    "debug.php", "debug/", "metrics", "METRICS", "actuator", "actuator/health",
    "actuator/env", "admin/config", "admin/settings", "dashboard/admin", "debug/info",
    "trace", "TRACE",
    # Backups
    "backup", "backup.zip", "backup.tar.gz", "backup.sql", "db.sql", "database.sql",
    "site.bak", "backup.bak", "data.zip", "archive.tar", "backup.gz", "site.sql", "db.bak",
    "backup/", "backups/", "data/", "archive/",
    # Cloud resources
    "storage", "files", "s3", "bucket", "storage/", "files/", "s3.amazonaws.com", "s3/",
    "storage/files", "uploads", "uploads/", "public/", "assets/"
]

# ----------------------------
# Pattern groups by category
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
    ("Long Base64 (60+)", re.compile(r"(?<![A-Za-z0-9+/=])([A-Za-z0-9+/]{60,}={0,2})(?![A-Za-z0-9+/=])")),
    ("Hex String (64+)", re.compile(r"\b[0-9a-fA-F]{64,}\b")),
    # Sensitive information
    ("Email", re.compile(r"\b[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}\b")),
    ("Phone", re.compile(r"\b(?:\+?\d{1,3}[-.\s]?)?(?:\(?\d{2,4}\)?[-.\s]?){1,3}\d{3,4}\b")),
]

_URL_PATTERNS: List[Tuple[str, re.Pattern]] = [
    ("URL", re.compile(r"\bhttps?://[^\s'\"<>()]+")),
    ("IPv4 Address", re.compile(r"\b(?:(?:25[0-5]|2[0-4]\d|1?\d?\d)(?:\.(?:25[0-5]|2[0-4]\d|1?\d?\d)){3})\b")),
    ("IPv6 Address", re.compile(
        r"\b(?:(?:[A-F0-9]{1,4}:){7}[A-F0-9]{1,4}|"
        r"(?:[A-F0-9]{1,4}:){1,7}:|"
        r":(?::[A-F0-9]{1,4}){1,7}|"
        r"(?:[A-F0-9]{1,4}:){1,6}:[A-F0-9]{1,4}|"
        r"(?:[A-F0-9]{1,4}:){1,5}(?::[A-F0-9]{1,4}){1,2}|"
        r"(?:[A-F0-9]{1,4}:){1,4}(?::[A-F0-9]{1,4}){1,3}|"
        r"(?:[A-F0-9]{1,4}:){1,3}(?::[A-F0-9]{1,4}){1,4}|"
        r"(?:[A-F0-9]{1,4}:){1,2}(?::[A-F0-9]{1,4}){1,5})\b",
        re.I)),
]

# Dynamic regex built from provided sensitive filenames and paths
SENSITIVE_FILE_RE = re.compile(
    r"(?i)\b(?:" + "|".join(re.escape(p) for p in SENSITIVE_PATH_KEYWORDS) + r")\b"
)

_PATH_PATTERNS: List[Tuple[str, re.Pattern]] = [
    # Safe for Python 3.13: fixed-width lookbehinds
    ("Web Path", re.compile(r"(?:(?<!https://)(?<!http://)/[A-Za-z0-9_\-./]{3,})")),
    ("Unix Path", re.compile(r"(?:(?:\.\./)|(?:/))(?:[A-Za-z0-9._\-/]{3,})")),
    ("Windows Path", re.compile(r"(?:[A-Za-z]:\\[A-Za-z0-9_.\\\-]{3,}|\\\\[A-Za-z0-9_.\\\-]{3,})")),
    ("Sensitive File/Path/Endpoint", SENSITIVE_FILE_RE),
]

# Default patterns: secrets + URLs/IPs (paths/files removed from default)
_DEFAULT_PATTERNS = _SECRET_PATTERNS + _URL_PATTERNS

_KEYWORD_ASSIGN_RE = re.compile(
    r"\b(?:" + "|".join(re.escape(k) for k in KEYWORDS) + r")\b\s*[:=]|Authorization\s+|Bearer\s+",
    re.I
)

# ----------------------------
# Helpers
# ----------------------------
def is_url(s: str) -> bool:
    try:
        p = urlparse(s)
        return p.scheme in ("http", "https")
    except Exception:
        return False

def fetch_to_tempfile(url: str, timeout: int = 15) -> Optional[str]:
    headers = {"User-Agent": USER_AGENT}
    try:
        r = requests.get(url, headers=headers, timeout=timeout, allow_redirects=True)
        r.raise_for_status()
        tmp = tempfile.NamedTemporaryFile(delete=False, suffix=".html")
        tmp.write(r.content)
        tmp.close()
        return tmp.name
    except Exception as e:
        print(f"[!] Failed to fetch {url}: {e}", file=sys.stderr)
        return None

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
def build_patterns(scan_urls: bool, scan_secrets: bool, scan_paths: bool) -> List[Tuple[str, re.Pattern]]:
    """Return ordered list of (name, pattern) to use for scanning based on flags."""
    if not (scan_urls or scan_secrets or scan_paths):
        return list(_DEFAULT_PATTERNS)
    patterns: List[Tuple[str, re.Pattern]] = []
    if scan_secrets:
        patterns += _SECRET_PATTERNS
    if scan_urls:
        patterns += _URL_PATTERNS
    if scan_paths:
        patterns += _PATH_PATTERNS
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
    p.add_argument("targets", nargs="+", help="File paths or URLs to scan (auto-detected).")
    p.add_argument("--scan-urls", action="store_true", help="Scan only URLs and IPs.")
    p.add_argument("--scan-secrets", action="store_true", help="Scan only secrets (keys, tokens, creds, emails, phones).")
    p.add_argument("--scan-paths", action="store_true", help="Scan only paths and files (web/unix/windows/sensitive lists).")
    p.add_argument("--json", action="store_true", help="Output JSON to stdout.")
    p.add_argument("--csv", metavar="CSVFILE", help="Write CSV to file.")
    p.add_argument("-o", "--output", metavar="FILE", help="Write plain-line output to file.")
    p.add_argument("--quiet", action="store_true", help="Minimal stdout; still writes outputs if specified.")
    p.add_argument("--timeout", type=int, default=15, help="HTTP timeout seconds when fetching URLs.")
    return p

def main(argv=None):
    args = build_argparser().parse_args(argv)
    patterns = build_patterns(scan_urls=args.scan_urls, scan_secrets=args.scan_secrets, scan_paths=args.scan_paths)

    all_findings: List[Dict[str, Any]] = []
    temp_files: List[str] = []

    for target in args.targets:
        if is_url(target):
            tmp = fetch_to_tempfile(target, timeout=args.timeout)
            if not tmp:
                continue
            temp_files.append(tmp)
            try:
                text = read_file(tmp)
            except Exception as e:
                print(f"[!] Could not read {target}: {e}", file=sys.stderr)
                continue
            findings = scan_text(target, text, patterns)
        else:
            if not os.path.isfile(target):
                print(f"[!] Not a valid file: {target}", file=sys.stderr)
                continue
            try:
                text = read_file(target)
            except Exception as e:
                print(f"[!] Could not read {target}: {e}", file=sys.stderr)
                continue
            findings = scan_text(target, text, patterns)
        all_findings.extend(findings)

    for fpath in temp_files:
        try:
            os.remove(fpath)
        except Exception:
            pass

    all_findings.sort(key=lambda x: (x.get("source", ""), int(x.get("line", 0))))

    def fmt(f: Dict[str, Any]) -> str:
        return f"[{f['source']}] : line {f['line']} : {f['type']} : {f['raw']}"

    if args.json:
        print(json.dumps(all_findings, indent=2, ensure_ascii=False))
    else:
        lines = [fmt(f) for f in all_findings]
        if args.output:
            with open(args.output, "w", encoding="utf-8") as fh:
                fh.write("\n".join(lines))
            if not args.quiet:
                print(f"[+] Wrote {len(lines)} findings to {args.output}")
        elif not args.quiet:
            for L in lines:
                print(L)

    if args.csv:
        keys = ["source", "line", "type", "raw", "context"]
        with open(args.csv, "w", newline="", encoding="utf-8") as csvf:
            w = csv.DictWriter(csvf, fieldnames=keys)
            w.writeheader()
            for f in all_findings:
                w.writerow({k: f.get(k, "") for k in keys})
        if not args.quiet:
            print(f"[+] Wrote CSV ({len(all_findings)} rows) to {args.csv}")

    if not args.quiet:
        print(f"[+] Reconit done. {len(all_findings)} potential findings.")

if __name__ == "__main__":
    main()
