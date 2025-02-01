# Base image for PHP with all dependencies
FROM php:8.2-fpm-alpine

# Install essential system packages & required libraries
RUN apk update && apk add --no-cache \
    curl git less nano vim unzip zip nginx supervisor \
    libpng-dev libjpeg-turbo-dev freetype-dev libmemcached-dev imagemagick imagemagick-dev \
    nodejs npm libzip-dev yarn gcc make autoconf g++ pkgconfig

# Install PHP extensions installer script
RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o /usr/local/bin/install-php-extensions \
  && chmod +x /usr/local/bin/install-php-extensions

# Install PHP extensions
RUN install-php-extensions exif gd memcached mysqli pcntl pdo_mysql zip

# Install and enable Imagick
RUN pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-source delete

# Cleanup unnecessary build tools
RUN apk del gcc make autoconf g++

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WordPress CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/bin/wp

# Define the working directory
WORKDIR /var/www/html

# Copy Bedrock files
COPY ./wordpress /var/www/html

# Install Composer dependencies for Bedrock
RUN composer install --no-dev --optimize-autoloader

# Move to Sage theme directory and install theme dependencies
WORKDIR /var/www/html/web/app/themes/portfolio
RUN composer install --no-dev --optimize-autoloader \
  && yarn install \
  && yarn build

# Return to the root directory
WORKDIR /var/www/html

# Creates the user if it doesnt exist and sets
RUN id -u www-data >/dev/null 2>&1 || adduser -D -u 1000 -G www-data www-data \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configure nginx, php-fpm, and supervisor (custom files)
COPY ./build/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./build/nginx/sites-enabled /etc/nginx/conf.d
COPY ./build/supervisor/supervisord.conf /etc/supervisord.conf

# Expose ports for nginx and php-fpm
EXPOSE 80 9000

# Start supervisor to manage nginx and php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
