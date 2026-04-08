#!/bin/sh

set -eu

port="${PORT:-80}"
nginx_site="/etc/nginx/conf.d/default.conf"

if [ "${port}" != "80" ]; then
  sed -i "s/listen \[::\]:80;/listen [::]:${port};/" "${nginx_site}"
  sed -i "s/listen 80;/listen ${port};/" "${nginx_site}"
fi

if [ "${DB_DRIVER:-mysql}" = "pgsql" ]; then
  install-pg4wp /var/www/html/web/app
fi

exec /usr/bin/supervisord -c /etc/supervisord.conf
