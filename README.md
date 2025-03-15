# Laravel Installation Guide

## Requirements
- PHP 8.3 and above
- Composer
- MySQL server or any SQL engine

## Installation Steps

1. **Clone the repository:**
    clone the repository from this repo
    cd your-repository

2. **Install Composer dependencies:**
    composer install

3. **Copy the `.env.example` file to `.env`:**
    cp .env.example .env

4. **Generate an application key:**
    php artisan key:generate

5. **Configure your environment variables in the `.env` file.**

    Configure your db connection, table, and db user

6. **Run the database migrations:**
    php artisan migrate

7. **Start the development server:**
    php artisan serve

Your Laravel application should now be up and running.
