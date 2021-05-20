## Hicaliber PHP developer test case

### System requirements:

- PHP 7.4
- MySQL 8
- npm

### How to install:

- git pull https://github.com/IsakovIgor/hicaliber.git
- cd ./hicaliber 
- cp .env.example and change your database connection
- composer install
- php artisan migrate
- php artisan app:seed (use it instead of php artisan db:seed for parse csv)
- npm i
- npm run dev (or npm run prod for production)
- php artisan serve

Sorry, if I wrote wrong company name somewhere :-)
