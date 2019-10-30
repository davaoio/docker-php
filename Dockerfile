FROM php:7.3-apache
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN docker-php-ext-install mysqli