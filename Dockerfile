# Dockerfile

# Menggunakan image PHP resmi
FROM php:8.2-fpm

# Install dependencies yang diperlukan untuk Laravel
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

# Tambahkan pengguna dan grup www-data
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data || \
    { groupadd -g 1000 www-data; useradd -u 1000 -g www-data -m -s /bin/bash www-data; }

# Install Composer untuk mengelola dependensi PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory untuk Laravel
WORKDIR /var/www/html

# Copy semua file proyek Laravel ke dalam container
COPY . .

# Install semua dependensi Laravel
RUN composer install --no-dev --no-scripts --no-interaction

# Set permission agar Laravel bisa menulis di folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 untuk mengakses PHP-FPM
EXPOSE 9000

# Jalankan PHP-FPM saat container dijalankan
CMD ["php-fpm"]
