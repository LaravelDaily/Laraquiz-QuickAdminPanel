FROM php:7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client curl zip unzip
RUN docker-php-ext-install mcrypt pdo_mysql

WORKDIR /var/www
