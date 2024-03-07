FROM php:latest

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install -j$(nproc) curl

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=8000

#  composer create-project laravel/laravel example-app