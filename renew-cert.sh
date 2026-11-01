#!/bin/bash
set -e

cd /var/www/sauna-rally

docker run --rm \
  -v "/etc/letsencrypt:/etc/letsencrypt" \
  -v "/var/lib/letsencrypt:/var/lib/letsencrypt" \
  -v "/var/log/letsencrypt:/var/log/letsencrypt" \
  certbot/dns-cloudflare:v5.4.0 renew --no-random-sleep-on-renew

docker exec saunas-nginx nginx -s reload