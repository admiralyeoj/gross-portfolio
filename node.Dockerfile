FROM node:16.14-alpine3.15
WORKDIR /var/www/html/web/app/themes/portfolio

RUN yarn
RUN yarn build