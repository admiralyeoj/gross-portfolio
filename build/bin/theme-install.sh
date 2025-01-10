#!/bin/bash

set -e

cd wordpress/web/app/themes/portfolio

echo "Starting Composer install for theme"
composer install > /var/www/html/composer.log 2>&1 || { echo "Composer install failed"; cat /var/www/html/composer.log; exit 1; }
echo "Theme Composer install completed"

echo "Starting Yarn install for theme"
yarn install > /var/www/html/yarn.log 2>&1 || { echo "Yarn install failed"; cat /var/www/html/yarn.log; exit 1; }
yarn build > /var/www/html/yarn.log 2>&1 || { echo "Yarn build failed"; cat /var/www/html/yarn.log; exit 1; }
echo "Theme Yarn install completed"