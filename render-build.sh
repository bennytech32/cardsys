#!/usr/bin/env bash
# exit on error
set -o errexit

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Clearing caches..."
php artisan optimize:clear

echo "Running migrations..."
# Tunatumia --force kwa sababu tupo kwenye production
php artisan migrate --force