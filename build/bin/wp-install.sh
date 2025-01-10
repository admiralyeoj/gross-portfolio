#!/bin/bash

set -e

echo "Starting Composer install for website"
composer install > /srv/composer.log 2>&1 || { echo "Composer install failed"; cat /srv/composer.log; exit 1; }

echo "Website Composer install completed"


cd web/app/themes/portfolio

echo "Starting Composer install for theme"
composer install > /srv/composer.log 2>&1 || { echo "Composer install failed"; cat /srv/composer.log; exit 1; }
echo "Theme Composer install completed"

echo "Starting Yarn install for theme"
yarn install > /srv/yarn.log 2>&1 || { echo "Yarn install failed"; cat /srv/yarn.log; exit 1; }
yarn build > /srv/yarn.log 2>&1 || { echo "Yarn build failed"; cat /srv/yarn.log; exit 1; }
echo "Theme Yarn install completed"

echo "Installing WordPress"
wp core install --url=$WP_HOME \
  --title=wp \
  --admin_user=$WP_USER \
  --admin_email=$WP_USER_EMAIL \
  --admin_password=$WP_PASSWORD

echo "Installing WP CLI Login Command"
wp package install aaemnnosttv/wp-cli-login-command || echo 'wp-cli-login-command is already installed'

echo "Activating WP CLI Login"
wp login install --activate --yes --skip-plugins --skip-themes

echo "Logging in as user 1"
wp login as 1

echo "Starting Supervisor"
/usr/bin/supervisord -c /etc/supervisord.conf


