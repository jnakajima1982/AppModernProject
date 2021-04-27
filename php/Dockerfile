FROM php:7.4-apache

RUN apt-get update \
  && apt-get install -y vim mariadb-client libzip-dev iputils-ping net-tools

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mysqli

#COPY ./default.conf /etc/nginx/conf.d/default.conf 
#COPY ../code/ /var/www/html
WORKDIR /var/www
