## Ubuntu inicial
FROM ubuntu:18.04
MAINTAINER apache
RUN apt-get update
RUN apt-get -y install apache2 apache2-utils

## Instalacion de php
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y tzdata
RUN apt-get install -qq php7.2
RUN apt-get -qq install software-properties-common
RUN apt-add-repository ppa:ondrej/php
RUN apt-get -qq install libapache2-mod-php7.2 php7.2-mbstring \
    php7.2-xmlrpc php7.2-soap php7.2-gd php7.2-xml php7.2-cli php7.2-zip \
    php7.2-pgsql libapache2-mod-php

## Instalacion editor txt nano y curl
RUN apt-get install nano
RUN apt-get update && apt-get install -y curl

## Instalacion Git y configuracion de git (datos johan)
RUN apt-get -qq install git

## Git Proyecto
#WORKDIR /var/www/html
#RUN git clone https://github.com/johandos/laravel-auth.git

## Instalar Composer
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
WORKDIR /var/www/html

## configuracion composer
RUN composer install
RUN chmod -R 777 storage/
RUN cp .env.example .env
RUN php artisan key:generate

EXPOSE 80
WORKDIR /

VOLUME /home/johan/proyectos/php/laravel/auth:/var/www/html

## configuracion host
RUN rm etc/apache2/sites-enabled/000-default.conf
RUN touch etc/apache2/sites-enabled/000-default.conf
RUN echo '<VirtualHost *:80>\n ServerAdmin johan.ospina05@hotmail.com \n DocumentRoot /var/www/html/public \n ErrorLog ${APACHE_LOG_DIR}/error.log \n CustomLog ${APACHE_LOG_DIR}/access.log combined \n </VirtualHost>' >> etc/apache2/sites-enabled/000-default.conf

CMD usr/sbin/apache2ctl -D FOREGROUND
