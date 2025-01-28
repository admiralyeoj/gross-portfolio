# Base image for PHP with all dependencies
FROM php:8.2-fpm-alpine AS base

LABEL name=bedrock-sage
LABEL intermediate=true

# Install essential packages (using apk for Alpine)
RUN apk update && apk add --no-cache \
    build-base \
    curl \
    git \
    gnupg \
    less \
    nano \
    vim \
    unzip \
    zip \
    dos2unix \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libmemcached-dev \
    lua-lzlib \
    gifsicle \
    jpegoptim \
    optipng \
    pngquant \
    bash \
    imagemagick \
    imagemagick-dev \
    nodejs \
    npm \
    nginx \
    supervisor \
    autoconf \
    gcc \
    g++ \
    make \
    libtool \
    pkgconfig \
    libzip-dev \
    && rm -rf /var/cache/apk/*

# Install php extensions installer script
RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o /usr/local/bin/install-php-extensions \
  && chmod +x /usr/local/bin/install-php-extensions

# Install php extensions one at a time for better debugging
RUN install-php-extensions exif || exit 1
RUN install-php-extensions gd || exit 1
# RUN install-php-extensions memcached || exit 1
RUN install-php-extensions mysqli || exit 1
RUN install-php-extensions pcntl || exit 1
RUN install-php-extensions pdo_mysql || exit 1
RUN install-php-extensions zip || exit 1


# Install Imagick PHP extension
RUN apk add --no-cache --virtual .build-deps gcc g++ make autoconf \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && apk del .build-deps  # Clean up build dependencies

# Clean up unnecessary files
RUN rm -rf /var/cache/apk/*

# Install global Node.js tools (Yarn)
RUN npm install -g yarn

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
# RUN composer install --no-dev --optimize-autoloader

# Move to Sage theme directory and install theme dependencies
# WORKDIR /var/www/html/web/app/themes/portfolio
# RUN composer install --no-dev --optimize-autoloader
# RUN yarn install && yarn build

# # Return to the root directory
# WORKDIR /var/www/html

# # Ensure the www-data group exists; create it only if it doesn't
# RUN if ! getent group www-data >/dev/null 2>&1; then \
#         # Create the group 'www-data' with GID 1000
#         addgroup -g 1000 www-data; \
#     fi && \
#     \
#     # Ensure the www-data user exists; create it only if it doesn't
#     if ! id -u www-data >/dev/null 2>&1; then \
#         # Create the user 'www-data' with UID 1000 and assign it to the group 'www-data'
#         adduser -D -u 1000 -G www-data www-data; \
#     fi && \
#     \
#     # Change ownership of the /var/www/html directory to the www-data user and group
#     chown -R www-data:www-data /var/www/html && \
#     \
#     # Set directory and file permissions to ensure the web server can read and execute them
#     chmod -R 755 /var/www/html

# # Configure nginx, php-fpm, and supervisor (custom files)
COPY ./build/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./build/nginx/sites-enabled /etc/nginx/conf.d
COPY ./build/supervisor/supervisord.conf /etc/supervisord.conf

# # Expose ports for nginx and php-fpm
EXPOSE 80 9000

# # Define a build argument to control if supervisord should be run
# ARG RUN_SUPERVISORD=true

# Start supervisor to manage nginx and php-fpm, but only if RUN_SUPERVISORD is true
# CMD ["/bin/sh", "-c", "if [ \"$RUN_SUPERVISORD\" = \"true\" ]; then /usr/bin/supervisord -c /etc/supervisord.conf; else echo 'Skipping supervisord'; fi"]
