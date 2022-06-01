FROM php:8.1-apache
RUN apt update && apt upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN apt install vim -y
RUN a2enmod rewrite
EXPOSE 80
