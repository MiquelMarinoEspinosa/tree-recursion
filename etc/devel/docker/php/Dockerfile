FROM php:7-cli-alpine

RUN apk add --no-cache --update --virtual buildDeps autoconf && apk add --no-cache alpine-sdk
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN mkdir -p /app

WORKDIR /app