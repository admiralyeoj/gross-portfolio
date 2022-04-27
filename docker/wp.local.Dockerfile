FROM php:fpm-alpine3.15

ENV PHP=php81

RUN apk upgrade && \
  apk add --no-cache bash \
  ca-certificates \
  curl \
  mysql-client
  
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install PHP
RUN apk add --no-cache php81 \
  php81-apcu \
  php81-bcmath \
  php81-common \
  php81-ctype \
  php81-curl \
  php81-dev \
  php81-dom \
  php81-fpm \
  php81-gd \
  php81-iconv \
  php81-intl \
  php81-json \
  php81-mbstring \
  php81-mcrypt \
  php81-mysqli \
  php81-opcache \
  php81-openssl \
  php81-pdo \
  php81-pdo_mysql \
  php81-pear \
  php81-phar \
  php81-session \
  php81-simplexml \
  php81-tokenizer \
  php81-xml \
  php81-xmlreader \
  php81-xmlwriter \
  # php81-zip

# Install XDebug
#RUN pecl config-set php_ini /etc/php7/php.ini
#RUN pecl install xdebug
#RUN echo 'zend_extension=/usr/lib/php7/modules/xdebug.so' >> /etc/php7/php.ini
#RUN touch /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.remote_enable = 1' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.remote_autostart = 1' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.remote_connect_back = 1' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.remote_handler = dbgp' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.profiler_enable = 1' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.profiler_output_dir = "/data/web"' >> /etc/php7/conf.d/xdebug.ini
#RUN echo 'xdebug.remote_port = 9000' >> /etc/php7/conf.d/xdebug.ini

# Remove unused dependencies
RUN rm -rf /var/cache/apk/*

RUN mkdir /var/cache/composer
ENV COMPOSER_HOME=/var/cache/composer


# WORDPRESS CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN php ./wp-cli.phar --info
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

# PHP Composer
COPY docker/bin/composer-install.sh /tmp/composer-install.sh
RUN /tmp/composer-install.sh

WORKDIR /site

RUN ls -al

# Update composer dependencies at runtime
USER 1000
COPY docker/bin/wp-entrypoint.sh /usr/local/bin/wp-entrypoint.sh
ENTRYPOINT ["wp-entrypoint.sh"]
CMD ["wp", "server", "--docroot=web", "--host=0.0.0.0"]
