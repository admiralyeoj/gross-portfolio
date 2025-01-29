# Base image for PHP with all dependencies
FROM php:8.2-fpm-alpine AS base

LABEL name=bedrock-sage
LABEL intermediate=true

# Install essential packages (using apk for Alpine)
RUN apk update && apk add --no-cache curl git less nano vim unzip zip nginx supervisor
RUN apk add --no-cache libpng-dev libjpeg-turbo-dev freetype-dev libmemcached-dev imagemagick imagemagick-dev
RUN apk add --no-cache nodejs npm libzip-dev yarn

# Install php extensions installer script
RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o /usr/local/bin/install-php-extensions \
  && chmod +x /usr/local/bin/install-php-extensions

# Install PHP extensions and Imagick
RUN apk add --no-cache --virtual .build-deps \
    gcc make autoconf g++ libpng-dev libjpeg-turbo-dev freetype-dev libmemcached-dev imagemagick-dev \
  && install-php-extensions exif gd memcached mysqli pcntl pdo_mysql zip \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && apk del .build-deps

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

# Ensure the www-data group exists; create it only if it doesn't
RUN if ! getent group www-data >/dev/null 2>&1; then \
        # Create the group 'www-data' with GID 1000
        addgroup -g 1000 www-data; \
    fi && \
    \
    # Ensure the www-data user exists; create it only if it doesn't
    if ! id -u www-data >/dev/null 2>&1; then \
        # Create the user 'www-data' with UID 1000 and assign it to the group 'www-data'
        adduser -D -u 1000 -G www-data www-data; \
    fi && \
    \
    # Change ownership of the /var/www/html directory to the www-data user and group
    chown -R www-data:www-data /var/www/html && \
    \
    # Set directory and file permissions to ensure the web server can read and execute them
    chmod -R 755 /var/www/html

# Configure nginx, php-fpm, and supervisor (custom files)
COPY ./build/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./build/nginx/sites-enabled /etc/nginx/conf.d
COPY ./build/supervisor/supervisord.conf /etc/supervisord.conf

# Expose ports for nginx and php-fpm
EXPOSE 80 9000

# Start supervisor to manage nginx and php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

