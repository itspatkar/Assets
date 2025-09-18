#!/bin/bash

if [ -z "$1" ]; then
    echo "$0: missing URL"
    echo "Usage: $0 [URL] -[OPTIONS]"
    exit 1
fi

URL="$1"
DOMAIN=$(echo "$URL" | sed -E 's#^https?://##' | cut -d/ -f1)
DIR="Report_$(echo ""$DOMAIN"" | tr '[:lower:]' '[:upper:]')"

mkdir -p "$DIR"

echo -e "Initialing Scans...\n"

# NMAP
nmap(){
    nmap --script whois-domain --script-args whois-domain.target="$DOMAIN" "$DOMAIN" -oN "$DIR/nmap_whois.txt" # whois
    nmap -sS -sVC -T2 -oN nmap_service.txt "$DOMAIN" # port/service
    nmap -p 53 --script dns-brute,dns-recursion,dns-service-discovery,dns-zone-transfer "$DOMAIN" -oN "$DIR/nmap_dns.txt" # DNS
    nmap -p 80,443 --script http-headers,http-security-headers "$DOMAIN" -oN "$DIR/nmap_headers.txt" # security headers
    nmap -p 443 --script ssl-enum-ciphers,ssl-cert,ssl-dh-params,ssl-heartbleed "$DOMAIN" -oN "$DIR/nmap_ssl.txt" # SSL/TLS
    nmap -Pn -sC -sV --script vuln $"$DOMAIN" -oN "$DIR/nmap_vuln.txt" # vuln scan
    nmap --script http-slowloris-check "$DOMAIN" -oN "$DIR/nmap_slowloris.txt" # slowloris check
}

# Whois
whois "$DOMAIN" > "$DIR/whois.txt"

# DNS
fierce -dns $URL -wide -traverse 10 -threads 10 > "$DIR/dns_fierce.txt"
dnsrecon -d $URL -t std,axfr,brt,rvl,goo,bing > "$DIR/dns_dnsrecon.txt"
amass enum -d $URL -passive -active -src -ip -o "$DIR/dns_amass.txt"
dnsenum --enum --threads 10 --dnsserver 8.8.8.8 $URL > "$DIR/dns_dnsenum.txt"

# Subdomain
subfinder -d $URL -all -recursive -silent -o "$DIR/subdomain_subfinder.txt"
assetfinder --subs-only $URL | tee "$DIR/subdomain_assetfinder.txt"
amass enum -d $URL -active -src -brute -o "$DIR/subdomain_amass.txt"

# Security Headers
shcheck.py $URL > "$DIR/headers_shcheck.txt"

# SSL/TLS
testssl -U -p -S --wide --openssl=openssl $URL --logfile "$DIR/ssl_testssl.txt"
sslyze --regular --certinfo=full --http_headers $URL:443 > "$DIR/ssl_sslyze.txt"
sslscan --show-cipher-ids --show-sigs --show-certificate $URL:443 > "$DIR/ssl_sslscan.txt"

# Technology & Framework Fingerprinting
whatweb -v -a 3 -t 50 -o "$DIR/fingerprint_whatweb.txt" $URL
retire --url $URL --outputformat text --outputpath "$DIR/fingerprint_retire.txt"

# OSINT
waybackurls "$DOMAIN" | sort -u > osint_waybackurls.txt
getJS -url $URL -complete -resolve -threads 6 -output getjs.txt
gau $URL > osint_gau.txt

# Automated Vulneribility Scanners
nikto -h "$DOMAIN" -port 443 -ssl -Tuning x 6 -Plugins ALL -C all -Display V -o "$DIR/nikto.txt" -Format txt
nuclei -target "$DOMAIN" | tee -a "$DIR/nuclei.txt"
katana -u "$DOMAIN" -kf robots.txt,sitemap.xml -d 5 | tee -a "$DIR/katana.txt"
wpscan --url "$DOMAIN" --enumerate u,ap,at -o wpscan.txt --format cli-no-color
wapiti -u "$DOMAIN" -m "all" --scope all --max-depth 5 --random-agent --color -o "$DIR/wapiti.txt" --format html,json --ignore-redirects

# WAF
wafw00f
