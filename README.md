<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project
This Project is a simple and basic E-commerce using laravel

## Packages Used
-laravel/ui
-spatie/laravel-permission

## Tech/framework used
### Built with
Laravel

## Features
For Customer:
Customer can add & drop products from shopping cart.. After Registeration Customer must verify his mail to ba able to add products

For Admin:
Admin has all CRUD on Products and Customers and categories and brands.

## Installation
Please check the official laravel installation guide for server requirements before you start. Official Documentation
Clone the repository git clone https://github.com/jihadfathalla/-E-commerce-with-laravel

Switch to the repo folder cd E-commerce
Install all the dependencies using composer composer install
Generate a new application key php artisan key:generate
Run the database migrations and seed (Set the database credentials in .env before migrating) php artisan migrate:fresh --seed
Start the local development server php artisan serve
You can now access the server at http://localhost:8000

## Command List
git clone https://github.com/jihadfathalla/-E-commerce-with-laravel
cd .env.example .env
composer install
cd .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

## website on Herku 
http://obscure-coast-33841.herokuapp.com/
note: the Verify Mail and Mail Confirmation will not work on website becouse Herku don't support SMTP library.


