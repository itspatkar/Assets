#!/usr/bin/env bash
# reconvuln2.sh
# Refactored recon + vuln wrapper
# Usage:
#   ./reconvuln2.sh -t <target> -s <passive|active|stealth|all> [-o <output_dir>] [-v]
#
# - If --output (-o) is provided, outputs are written into that folder (created if missing).
# - If --output is NOT provided, a Report_<DOMAIN>_<TIMESTAMP> folder is created in the current working directory.
# - --verbose / -v prints outputs to screen (via tee) and still writes files. Default is quiet (only files).
#
# NOTE: Run only against targets you are authorized to test.

set -o errexit
set -o nounset
set -o pipefail

# ---------- defaults ----------
TIMESTAMP="$(date +%Y%m%d_%H%M%S)"
SCAN_MODE=""        # passive | active | stealth | all
OUTDIR=""           # user-specified base directory (optional)
TARGET_RAW=""
VERBOSE=0           # 0 = quiet (default). 1 = verbose: tee to screen.
# flags resolved from scan mode
DO_PASSIVE=0
DO_ACTIVE=0
DO_STEALTH=0
DO_NMAP=0
DO_VULN=0
# --------------------------------

usage(){
cat <<EOF
Usage: $0 --target <URL|domain> --scan <passive|active|stealth|all> [--output <dir>] [--verbose]

Options:
  -t, --target     TARGET URL or domain (required)
  -s, --scan       Scan mode: passive, active, stealth, or all (required)
  -o, --output     Output directory (optional). If omitted a Report_<DOMAIN>_<TIMESTAMP> directory
                   will be created in the current working directory.
  -v, --verbose    Print each tool's output to screen (and save to file). Default: quiet.
  -h, --help       Show this help
Examples:
  $0 -t https://example.com -s passive
  $0 --target example.com --scan all --output /tmp/reports --verbose
EOF
}

# warn if tool missing
check_tool(){
    if ! command -v "$1" &>/dev/null; then
        echo "WARN: '$1' not found in PATH (some steps may fail)"
    fi
}

# run command helper:
# Arguments: 1 = command string (quoted), 2 = outfile path (absolute or relative)
# If VERBOSE=1, prints command and tees output to screen and outfile.
# If VERBOSE=0, writes stdout->outfile and discards stderr.
run_cmd(){
    local cmd="$1"
    local outfile="$2"
    # ensure outfile directory exists
    mkdir -p "$(dirname "$outfile")"
    if [[ $VERBOSE -eq 1 ]]; then
        echo "[VERBOSE] $cmd"
        # use eval so complex commands and pipes work
        eval "$cmd" 2>&1 | tee "$outfile"
    else
        # quiet: write stdout to file, discard stderr
        eval "$cmd" >"$outfile" 2>/dev/null || true
    fi
}

# ---------- arg parsing ----------
if [ $# -eq 0 ]; then
    usage
    exit 1
fi

while [[ $# -gt 0 ]]; do
    case "$1" in
        -t|--target)
            TARGET_RAW="$2"; shift 2;;
        -s|--scan)
            SCAN_MODE="$2"; shift 2;;
        -o|--output)
            OUTDIR="$2"; shift 2;;
        -v|--verbose)
            VERBOSE=1; shift;;
        -h|--help)
            usage; exit 0;;
        --) shift; break;;
        -*)
            echo "Unknown option: $1"; usage; exit 2;;
        *)
            # allow positional target if user supplies one without flag
            if [[ -z "$TARGET_RAW" ]]; then
                TARGET_RAW="$1"
            fi
            shift
            ;;
    esac
done

if [[ -z "${TARGET_RAW:-}" ]]; then
    echo "ERROR: --target is required."
    usage
    exit 1
fi

if [[ -z "${SCAN_MODE:-}" ]]; then
    echo "ERROR: --scan is required (passive|active|stealth|all)."
    usage
    exit 1
fi

# normalize target/domain
TARGET_RAW="${TARGET_RAW%/}"                      # remove trailing slash
DOMAIN="$(echo "$TARGET_RAW" | sed -E 's#^https?://##' | cut -d/ -f1)"
SAFE_DOMAIN="$(echo "$DOMAIN" | tr '[:lower:]' '[:upper:]')"

# decide BASE_DIR behavior:
# - If OUTDIR provided: write directly into OUTDIR (create it)
# - If OUTDIR not provided: create ./Report_<DOMAIN>_<TIMESTAMP>
if [[ -n "${OUTDIR:-}" ]]; then
    BASE_DIR="${OUTDIR%/}"
    mkdir -p "$BASE_DIR"
else
    BASE_DIR="./Report_${SAFE_DOMAIN}_${TIMESTAMP}"
    mkdir -p "$BASE_DIR"
fi

echo "Target: $TARGET_RAW"
echo "Domain: $DOMAIN"
echo "Scan mode: $SCAN_MODE"
echo "Output directory: $BASE_DIR"
echo "Verbose: $VERBOSE"
echo

# map scan mode to flags
case "$SCAN_MODE" in
    passive)
        DO_PASSIVE=1
        ;;
    active)
        DO_ACTIVE=1
        DO_NMAP=1
        DO_VULN=1
        ;;
    stealth)
        DO_STEALTH=1
        DO_NMAP=1
        ;;
    all)
        DO_PASSIVE=1
        DO_ACTIVE=1
        DO_STEALTH=1
        DO_NMAP=1
        DO_VULN=1
        ;;
    *)
        echo "ERROR: Unknown scan mode: $SCAN_MODE"
        echo "Allowed: passive, active, stealth, all"
        exit 2
        ;;
esac

# ---------- helper file locations ----------
SUBS_PASSIVE="$BASE_DIR/subdomain_subfinder.txt"
SUBS_ASSET="$BASE_DIR/subdomain_assetfinder.txt"
SUBS_AMASS="$BASE_DIR/subdomain_amass.txt"
SUBS_ALL="$BASE_DIR/subdomains_all.txt"
WHOIS_FILE="$BASE_DIR/whois.txt"

# touch known files
touch "$SUBS_ALL" || true

# ---------- functions (all calls use run_cmd) ----------
run_whois(){
    echo "[*] whois -> $WHOIS_FILE"
    check_tool whois
    run_cmd "whois $DOMAIN" "$WHOIS_FILE"
}

run_dns_tools(){
    echo "[*] DNS enumeration (fierce, dnsrecon, amass, dnsenum)"
    check_tool fierce
    check_tool dnsrecon
    check_tool amass
    check_tool dnsenum

    if command -v fierce &>/dev/null; then
        run_cmd "fierce -dns $DOMAIN -wide -traverse 10 -threads 10" "$BASE_DIR/dns_fierce.txt"
    fi

    if command -v dnsrecon &>/dev/null; then
        run_cmd "dnsrecon -d $DOMAIN -t std,axfr,brt,rvl,goo,bing" "$BASE_DIR/dns_dnsrecon.txt"
    fi

    if command -v amass &>/dev/null; then
        run_cmd "amass enum -d $DOMAIN -passive -active -src -ip -o $BASE_DIR/dns_amass.txt" "$BASE_DIR/dns_amass.txt"
    fi

    if command -v dnsenum &>/dev/null; then
        run_cmd "dnsenum --enum --threads 10 --dnsserver 8.8.8.8 $DOMAIN" "$BASE_DIR/dns_dnsenum.txt"
    fi
}

run_subdomain(){
    echo "[*] Subdomain enumeration (subfinder, assetfinder, amass)"
    check_tool subfinder
    check_tool assetfinder
    check_tool amass

    if command -v subfinder &>/dev/null; then
        # subfinder writes to file by default; we capture stdout to our file
        run_cmd "subfinder -d $DOMAIN -all -recursive -silent" "$SUBS_PASSIVE"
    fi

    if command -v assetfinder &>/dev/null; then
        run_cmd "assetfinder --subs-only $DOMAIN" "$SUBS_ASSET"
    fi

    if command -v amass &>/dev/null; then
        run_cmd "amass enum -d $DOMAIN -active -src -brute -o $SUBS_AMASS" "$SUBS_AMASS"
    fi
}

run_security_headers(){
    echo "[*] Security headers check (shcheck.py)"
    check_tool python3
    if command -v shcheck.py &>/dev/null; then
        run_cmd "shcheck.py $TARGET_RAW" "$BASE_DIR/headers_shcheck.txt"
    fi
}

run_ssl_checks(){
    echo "[*] SSL/TLS checks (testssl, sslyze, sslscan)"
    check_tool testssl
    check_tool sslyze
    check_tool sslscan

    if command -v testssl &>/dev/null; then
        # testssl uses its own output options; capture stdout
        run_cmd "testssl -U -p -S --wide --openssl=openssl $TARGET_RAW" "$BASE_DIR/ssl_testssl.txt"
    fi

    if command -v sslyze &>/dev/null; then
        run_cmd "sslyze --regular --certinfo=full --http_headers $DOMAIN:443" "$BASE_DIR/ssl_sslyze.txt"
    fi

    if command -v sslscan &>/dev/null; then
        run_cmd "sslscan --show-cipher-ids --show-sigs --show-certificate $DOMAIN:443" "$BASE_DIR/ssl_sslscan.txt"
    fi
}

run_fingerprinting(){
    echo "[*] Technology fingerprinting (whatweb, retire)"
    check_tool whatweb
    check_tool retire

    if command -v whatweb &>/dev/null; then
        run_cmd "whatweb -v -a 3 -t 50 -o $BASE_DIR/fingerprint_whatweb.txt $TARGET_RAW" "$BASE_DIR/fingerprint_whatweb.txt"
    fi

    if command -v retire &>/dev/null; then
        run_cmd "retire --url $TARGET_RAW --outputformat text --outputpath $BASE_DIR/fingerprint_retire.txt" "$BASE_DIR/fingerprint_retire.txt"
    fi
}

run_osint(){
    echo "[*] OSINT (waybackurls, getJS, gau)"
    check_tool waybackurls
    check_tool getJS
    check_tool gau

    if command -v waybackurls &>/dev/null; then
        run_cmd "waybackurls $DOMAIN | sort -u" "$BASE_DIR/osint_waybackurls.txt"
    fi

    if command -v getJS &>/dev/null; then
        run_cmd "getJS -url $TARGET_RAW -complete -resolve -threads 6" "$BASE_DIR/getjs.txt"
    fi

    if command -v gau &>/dev/null; then
        run_cmd "gau $TARGET_RAW" "$BASE_DIR/osint_gau.txt"
    fi
}

run_nikto_nuclei_wapiti(){
    echo "[*] Automated vulnerability scanners (nikto, nuclei, katana, wpscan, wapiti)"
    check_tool nikto
    check_tool nuclei
    check_tool katana
    check_tool wpscan
    check_tool wapiti

    if command -v nikto &>/dev/null; then
        run_cmd "nikto -h $DOMAIN -port 443 -ssl -Tuning x 6 -Plugins ALL -C all -Display V -o $BASE_DIR/nikto.txt -Format txt" "$BASE_DIR/nikto.txt"
    fi

    if command -v nuclei &>/dev/null; then
        run_cmd "nuclei -target $DOMAIN" "$BASE_DIR/nuclei.txt"
    fi

    if command -v katana &>/dev/null; then
        run_cmd "katana -u $DOMAIN -kf robots.txt,sitemap.xml -d 5" "$BASE_DIR/katana.txt"
    fi

    if command -v wpscan &>/dev/null; then
        run_cmd "wpscan --url $DOMAIN --enumerate u,ap,at --no-color" "$BASE_DIR/wpscan.txt"
    fi

    if command -v wapiti &>/dev/null; then
        # wapiti's -o uses a filename; to keep it simple we capture stdout instead
        run_cmd "wapiti -u $TARGET_RAW -m all --scope all --max-depth 5 --random-agent --ignore-redirects" "$BASE_DIR/wapiti.txt"
    fi
}

run_waf(){
    echo "[*] WAF detection (wafw00f)"
    check_tool wafw00f
    if command -v wafw00f &>/dev/null; then
        run_cmd "wafw00f $TARGET_RAW" "$BASE_DIR/wafw00f.txt"
    fi
}

run_nmap_scans(){
    echo "[*] Nmap scans (multiple scripts/checks)"
    check_tool nmap

    if ! command -v nmap &>/dev/null; then
        echo "WARN: nmap not found, skipping nmap scans"
        return
    fi

    run_cmd "nmap --script whois-domain --script-args whois-domain.target=$DOMAIN $DOMAIN -oN - " "$BASE_DIR/nmap_whois.txt"
    run_cmd "nmap -sS -sVC -T2 -oN - $DOMAIN" "$BASE_DIR/nmap_service.txt"
    run_cmd "nmap -p 53 --script dns-brute,dns-recursion,dns-service-discovery,dns-zone-transfer $DOMAIN -oN -" "$BASE_DIR/nmap_dns.txt"
    run_cmd "nmap -p 80,443 --script http-headers,http-security-headers $DOMAIN -oN -" "$BASE_DIR/nmap_headers.txt"
    run_cmd "nmap -p 443 --script ssl-enum-ciphers,ssl-cert,ssl-dh-params,ssl-heartbleed $DOMAIN -oN -" "$BASE_DIR/nmap_ssl.txt"
    run_cmd "nmap -Pn -sC -sV --script vuln $DOMAIN -oN -" "$BASE_DIR/nmap_vuln.txt"
    run_cmd "nmap --script http-slowloris-check $DOMAIN -oN -" "$BASE_DIR/nmap_slowloris.txt"
}

run_stealth_scan(){
    echo "[*] Stealth mode (low-noise nmap)"
    check_tool nmap
    check_tool masscan

    if command -v nmap &>/dev/null; then
        run_cmd "nmap -sS -Pn -T2 --max-retries 2 --host-timeout 30m -p- $DOMAIN -oN -" "$BASE_DIR/nmap_stealth.txt"
    fi

    # masscan commented for safety; uncomment if you know what you're doing
    # if command -v masscan &>/dev/null; then
    #     run_cmd "sudo masscan -p1-65535 --rate 1000 $DOMAIN -oL $BASE_DIR/masscan_lowrate.txt" "$BASE_DIR/masscan_lowrate.txt"
    # fi
}

merge_subdomains(){
    echo "[*] merging discovered subdomains -> $SUBS_ALL"
    # Grep across outputs for anything that looks like a subdomain for this domain
    grep -Eo "([a-zA-Z0-9._-]+\.)+$DOMAIN" "$BASE_DIR"/* 2>/dev/null | sort -u > "$SUBS_ALL" 2>/dev/null || true

    # append individual files if present
    for f in "$SUBS_PASSIVE" "$SUBS_ASSET" "$SUBS_AMASS"; do
        if [[ -f "$f" ]]; then
            cat "$f" >> "$SUBS_ALL" 2>/dev/null || true
        fi
    done

    # deduplicate
    if [[ -f "$SUBS_ALL" ]]; then
        sort -u "$SUBS_ALL" -o "$SUBS_ALL" || true
    fi
}

# ---------- execution flow based on chosen scan ----------
echo "Initialising selected scans..."
echo

# Always run whois (light)
run_whois

if [[ $DO_PASSIVE -eq 1 ]]; then
    run_dns_tools
    run_subdomain
    run_security_headers
    run_ssl_checks
    run_fingerprinting
    run_osint
fi

if [[ $DO_ACTIVE -eq 1 ]]; then
    # Active includes active subdomain brute, vuln scans & waf detection
    run_subdomain
    run_nikto_nuclei_wapiti
    run_waf
fi

# Merge discovered subdomains
merge_subdomains

if [[ $DO_NMAP -eq 1 ]]; then
    run_nmap_scans
fi

if [[ $DO_STEALTH -eq 1 ]]; then
    run_stealth_scan
fi

if [[ $DO_VULN -eq 1 ]]; then
    run_nikto_nuclei_wapiti
fi

echo
echo "Completed. Results saved under: $BASE_DIR"
echo "Review outputs for false positives and ensure you have permission to test the target."
