#!/bin/bash

# Jalankan migrasi database
php artisan migrate --force

# Clear cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Tunggu sampai Nginx siap
nginx -g "daemon off;" &

# Jalankan PHP-FPM
php-fpm