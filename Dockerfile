FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd

RUN a2enmod rewrite

RUN echo "upload_max_filesize = 20M" > /usr/local/etc/php/conf.d/upload.ini && \
    echo "post_max_size = 20M" >> /usr/local/etc/php/conf.d/upload.ini

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/uploads

RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-req=php

RUN php artisan key:generate

RUN php artisan config:cache

RUN php artisan route:cache

RUN php artisan view:cache

RUN chmod -R 775 storage bootstrap/cache public/uploads

RUN rm -f public/storage

EXPOSE 80

COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
