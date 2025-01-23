FROM php:8.2-fpm AS base
LABEL name=wordpress
LABEL intermediate=true

# Install essential packages
RUN apt-get update \
  && apt-get install -y \
    build-essential \
    curl \
    git \
    gnupg \
    less \
    nano \
    vim \
    unzip \
    zip \
    dos2unix \
  && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
  && rm -rf /var/lib/apt/lists/* \
  && apt-get clean

FROM base AS php
LABEL name=wordpress
LABEL intermediate=true

# Install php extensions and related packages
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync \
  && install-php-extensions \
    @composer \
    exif \
    gd \ 
    memcached \
    mysqli \
    pcntl \
    pdo_mysql \
    zip \
  && apt-get update \
  && apt-get install -y \
    gifsicle \
    jpegoptim \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmemcached-dev \
    locales \
    lua-zlib-dev \
    optipng \
    pngquant \
  && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
  && rm -rf /var/lib/apt/lists/* \
  && apt-get clean

# Install ImageMagick and Imagick extension
RUN apt-get update \
  && apt-get install -y \
    imagemagick \
    libmagickwand-dev \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && rm -rf /var/lib/apt/lists/*

FROM php AS wordpress
LABEL name=wordpress

# Install nginx & supervisor
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash \
  && apt-get update \
  && apt-get install -y \
    nginx \
    nodejs \
    supervisor \
  && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
  && rm -rf /var/lib/apt/lists/* \
  && apt-get clean \
  && npm install -g yarn

# Configure nginx, php-fpm and supervisor
COPY ./build/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./build/nginx/sites-enabled /etc/nginx/conf.d
COPY ./build/nginx/sites-enabled /etc/nginx/sites-enabled
COPY ./build/php/8.2/fpm/pool.d /etc/php/8.2/fpm/pool.d
COPY ./build/supervisor/supervisord.conf /etc/supervisord.conf

# WordPress CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/bin/_wp;
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