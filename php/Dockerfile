FROM php:7.4-apache

RUN apt-get update \
  && apt-get install -y vim mariadb-client libzip-dev iputils-ping net-tools

#COPY ./default.conf /etc/nginx/conf.d/default.conf 
#COPY ../code/ /var/www/html
WORKDIR /var/www
