#!/bin/sh

# Menjalankan migrasi dan seeding database
php artisan migrate --force
php artisan db:seed --force

# Menjalankan PHP built-in server
exec php -S 0.0.0.0:8080 -t public