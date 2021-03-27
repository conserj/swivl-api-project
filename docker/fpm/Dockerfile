FROM php:8.0.3-fpm-alpine

WORKDIR /app

COPY . /app

RUN apk update && \
    apk add curl && \
    curl -sS https://getcomposer.org/installer | php && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer && \
    docker-php-ext-install mysqli pdo_mysql
