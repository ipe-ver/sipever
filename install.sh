#!/bin/bash
npm install
mkdir -p vendor
composer update
composer dump-autoload
php artisan migrate:refresh --seed
echo "Finalizado"
