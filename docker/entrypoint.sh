#!/bin/sh
set -e

echo "==> Running Laravel setup..."

# Ensure SQLite file exists
touch /var/www/html/database/database.sqlite

# Fix permissions before running artisan
chown -R www-data:www-data /var/www/html/storage /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/database

# Run migrations
php artisan migrate --force

# Cache configuration for production (skip view:cache — compiled on demand)
php artisan config:cache
php artisan route:cache

echo "==> Starting PHP-FPM..."
exec php-fpm
