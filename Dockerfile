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

#
WORKDIR /var/www/henriquedois
COPY . .

#Instalar o composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

#
RUN composer run-script post-autoload-dump
RUN php artisan optimize

#
RUN chown -R www-data:www-data /var/www/henriquedois/* 

#
COPY php.ini /usr/local/etc/php/

#
CMD ["apache2-foreground"]