FROM php:8.2-apache

# Instala a extensão PDO MySQL que seu projeto precisa para o banco de dados
RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html