# Project

## Create database
`CREATE SCHEMA `spa_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;`

## Install dependencies

`composer install`

## Run dev

`php artisan serve --port 8085`

## Migrate database

### migrate 
`php artisan migrate`

### seeder 
`php artisan migrate --seed`
