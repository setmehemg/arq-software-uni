FROM php:8.2-apache

ARG .env.example
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    curl \
    git \
    openssl

# Enable mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

## Set the working directory
WORKDIR /var/www/html

## Copy the application code for HTML folder
COPY . /var/www/html

## Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Install project dependencies
RUN composer install

##
COPY .env.example .env
RUN php artisan key:generate

## Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache