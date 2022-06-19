#Initialization of the project :

You can clone this project by doing this :

> git clone https://github.com/vulnerableproject

You need PHP 8.1, MySQL 5.7.33, Apache 2.4.47 (you can use Laragon). Yes,  that's really recent version...

First, do

> composer install

Then, you need to change the DB part in your .env

Don't forget to create a new db related to your .env

You can start to migrate your database and seed it :

> php artisan migrate

> php artisan db:seed --class=CustomerSeeder

*API

You got 2 URL in POST :

- http://vulnerableproject.test/api/login

- http://vulnerableproject.test/api/createCustomer