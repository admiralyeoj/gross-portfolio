#!/bin/bash

set -e

cd wordpress

# Check if required environment variables are set
if [ -z "$ACF_PRO_KEY" ] || [ -z "$WP_HOME" ]; then
  echo "ERROR: ACF_PRO_KEY and WP_HOME must be set."
  exit 1
fi

# Create the auth.json file
echo "{
  \"http-basic\": {
    \"connect.advancedcustomfields.com\": {
      \"username\": \"$ACF_PRO_KEY\",
      \"password\": \"$WP_HOME\"
    }
  }
}" > /var/www/html/wordpress/auth.json

echo "auth.json created successfully at /var/www/html/wordpress/auth.json."

echo "Starting Composer install for website"
composer install > /var/www/html/composer.log 2>&1 || { echo "Composer install failed"; cat /var/www/html/composer.log; exit 1; }
echo "Website Composer install completed"

cd web/app/themes/portfolio

echo "Starting Composer install for theme"
composer install > /var/www/html/composer.log 2>&1 || { echo "Composer install failed"; cat /var/www/html/composer.log; exit 1; }
echo "Theme Composer install completed"

echo "Starting Yarn install for theme"
yarn install > /var/www/html/yarn.log 2>&1 || { echo "Yarn install failed"; cat /var/www/html/yarn.log; exit 1; }
yarn build > /var/www/html/yarn.log 2>&1 || { echo "Yarn build failed"; cat /var/www/html/yarn.log; exit 1; }
echo "Theme Yarn install completed"

echo "Installing WordPress"
wp core install --url=$WP_HOME \
  --title=wordpress \
  --admin_user=$WP_USER \
  --admin_email=$WP_USER_EMAIL \
  --admin_password=$WP_PASSWORD

echo "Installing WP CLI Login Command"
wp package install aaemnnosttv/wp-cli-login-command || echo 'wp-cli-login-command is already installed'

echo "Activating WP CLI Login"
wp login install --activate --yes --skip-plugins --skip-themes

echo "Logging in as user 1"
wp login as 1

/usr/bin/supervisord -c /etc/supervisord.conf
