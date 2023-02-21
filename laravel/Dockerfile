FROM node:alpine as builder

WORKDIR /usr/src/app
COPY package*.json .
RUN npm install --silent

FROM php:7.4-fpm 

WORKDIR /root
RUN apt-get update            
RUN apt-get install -y curl
RUN apt-get install git -y

RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/bin/composer

RUN apt-get install -y zlib1g-dev && apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN export COMPOSER_ALLOW_SUPERUSER=1
RUN echo "export COMPOSER_ALLOW_SUPERUSER=1" >> ~/.bashrc

RUN composer global require laravel/installer
RUN composer global require laravel/laravel

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /var/www/html
RUN mv ~/.composer/vendor/ .

RUN ["/bin/bash", "-c", "echo PATH=$PATH:/var/www/html/vendor/bin/ >> ~/.bashrc"]
RUN ["/bin/bash", "-c", "source ~/.bashrc"]

COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer dump-autoload

RUN composer require league/flysystem-aws-s3-v3 "~1.0" --update-with-all-dependencies
COPY --from=builder /usr/src/app .
