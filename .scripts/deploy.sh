#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true

# Update codebase
git fetch origin deploy
git reset --hard origin/deploy

# Install composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Run database migrations
#php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"