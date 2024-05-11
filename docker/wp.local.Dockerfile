FROM php:8.1-fpm-alpine3.14

RUN apk upgrade && \
  apk add --no-cache bash \
  pcre-dev ${PHPIZE_DEPS} \
  imagemagick \
  imagemagick-dev \
  ca-certificates \
  curl \
  mysql-client \
  freetype-dev \
  libjpeg-turbo-dev \
  libpng-dev \
  libzip-dev \
  zlib-dev \
  zip \
  && pecl install imagick
  
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli 

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-enable imagick

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

# Forward Message to mailhog
# RUN curl --location --output /usr/local/bin/mhsendmail https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 && \
  #  chmod +x /usr/local/bin/mhsendmail
# RUN echo 'sendmail_path="/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025 --from=no-reply@gbp.lo"' > /usr/local/etc/php/conf.d/mailhog.ini


# Update composer dependencies at runtime
USER 1000
COPY docker/bin/wp-entrypoint.sh /usr/local/bin/wp-entrypoint.sh
ENTRYPOINT ["wp-entrypoint.sh"]
CMD ["wp", "server", "--docroot=web", "--host=0.0.0.0"]
