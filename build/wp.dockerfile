FROM php:8.2-fpm-alpine AS base

LABEL name=wordpress
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
    imagemagick-dev # Install imagemagick-dev for compiling imagick extension

# Install php extensions installer script
RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o /usr/local/bin/install-php-extensions && chmod +x /usr/local/bin/install-php-extensions

# Install php extensions
RUN install-php-extensions \
    @composer \
    exif \
    gd \
    memcached \
    mysqli \
    pcntl \
    pdo_mysql \
    zip

# Install Imagick PHP extension
RUN apk add --no-cache --virtual .build-deps gcc g++ make autoconf \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && apk del .build-deps  # Clean up build dependencies

# Clean up unnecessary files
RUN rm -rf /var/cache/apk/*

# Continue with the rest of your setup
FROM base AS wordpress
LABEL name=wordpress

# Install nginx, nodejs, npm, and supervisor on Alpine
RUN apk update && apk add --no-cache \
    nginx \
    nodejs \
    npm \
    supervisor \
  && rm -rf /var/cache/apk/* \
  && npm install -g yarn

# Configure nginx, php-fpm, and supervisor
COPY ./build/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./build/nginx/sites-enabled /etc/nginx/conf.d
COPY ./build/nginx/sites-enabled /etc/nginx/sites-enabled
COPY ./build/php/8.2/fpm/pool.d /etc/php/8.2/fpm/pool.d
COPY ./build/supervisor/supervisord.conf /etc/supervisord.conf

# WordPress CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/bin/_wp
COPY ./build/bin/wp.sh /var/www/html/wp.sh
RUN chmod +x /var/www/html/wp.sh \
  && mv /var/www/html/wp.sh /usr/bin/wp

# Installation helper
COPY /build/bin/wp-install.sh /var/www/html/wp-install.sh
RUN chmod +x /var/www/html/wp-install.sh

# Convert line endings
RUN dos2unix /var/www/html/wp-install.sh

WORKDIR /var/www/html

# CMD for installation script
CMD ["bash", "/var/www/html/wp-install.sh"]
