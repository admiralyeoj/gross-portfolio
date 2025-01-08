FROM node:lts-alpine3.15

RUN apk add --no-cache bash \
  autoconf \
  automake \
  make \
  g++ \
  libtool \
  gifsicle \
  libjpeg-turbo-utils \
  libpng-dev \
  libjpeg-turbo \
  libjpeg-turbo-dev \
  libpng \
  libpng-dev \
  libwebp \
  libwebp-dev \
  nasm \
  zlib \
  zlib-dev \
  lcms2-dev

RUN rm -rf /var/cache/apk/*

RUN yarn config set cache-folder /var/cache/yarn

WORKDIR /theme

COPY docker/bin/theme-entrypoint.sh /usr/local/bin/theme-entrypoint.sh
ENTRYPOINT ["theme-entrypoint.sh"]
