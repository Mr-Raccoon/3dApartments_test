<h1>Read me</h1>
You should have php version 7.1 or higher also installed Composer and Artisan.
<br>
<br>
For setting up this project run the following commands:

- composer install
- npm install
- cp .env.example .env
- php artisan key:generate

Create the database and add access data to .env file.

Then run:

- php artisan migrate
- npm run development
- php artisan serve
