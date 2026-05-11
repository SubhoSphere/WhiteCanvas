#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --no-interaction --prefer-dist

# Install NPM dependencies and build assets
npm install
npm run build

# Run migrations (force because it's production)
php artisan migrate --force

# Clear and cache config/routes/views
php artisan config:cache
php artisan route:cache
php artisan view:cache
