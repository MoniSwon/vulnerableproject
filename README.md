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

example of the body : 
>{

>    "email": "monica.walentek@gmail.com",

>    "password":"hey"

>}

- http://vulnerableproject.test/api/createCustomer

example of the body :
>{

>    "lastName":"Walentek",

>    "firstName":"MonicaAgain",

>    "email": "monica@gmail.com",

>    "password":"password",

>    "phone":"0612884439",

>    "gender":"F",

>    "birthdate":"1995-12-18"

>}

And one URL in GET :

- http://vulnerableproject.test/api/getCustomer?id=1

*Injection

Here an example of Injection we can do : http://vulnerableproject.test/api/getCustomer?id=1 OR 1=1 -> and we get all the id and password we need :)


Here folder which might me interesting to look if you are not familiar with Laravel :

- app/Http/Controllers/AutthentificationController

- routes/api.php