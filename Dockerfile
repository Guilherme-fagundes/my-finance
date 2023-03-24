FROM php:8.1-apache
#WORKDIR /var/www
#ADD . /var/www
RUN apt update && apt upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN apt install vim -y
RUN a2enmod rewrite
RUN service apache2 restart
EXPOSE 80

RUN chown -R www-data:www-data /var/www
#RUN chown -R www-data:www-data storage/
#RUN chmod 777 -R storage/

