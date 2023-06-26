FROM php:8.2-apache

# dependencias
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql
