# 1. Gunakan image PHP dengan versi yang tepat
FROM php:8.2-fpm

# 2. Install dependencies yang diperlukan untuk Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# 3. Install Composer untuk mengelola dependensi PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Set working directory untuk Laravel
WORKDIR /var/www/html

# 5. Copy semua file proyek Laravel ke dalam container
COPY . .

# 6. Install semua dependensi Laravel
RUN composer install --no-dev --no-scripts --no-interaction

# 7. Set permission agar Laravel bisa menulis di folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Expose port 9000 untuk mengakses PHP-FPM
EXPOSE 9000

# 9. Jalankan PHP-FPM saat container dijalankan
CMD ["php-fpm"]
