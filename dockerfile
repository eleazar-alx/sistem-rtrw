# Pake PHP 8.2 yang stabil
FROM php:8.2-fpm

# Install dependencies yang dibutuhin Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql gd zip

# Copy semua kodingan ke dalem container
COPY . /var/www
WORKDIR /var/www

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permission buat folder storage (Biar Laravel bisa nulis cache)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Jalankan server
CMD php artisan serve --host=0.0.0.0 --port=$PORT