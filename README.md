# pseConnectionWithLaravel

Project to connect the PSE webservice and show all the transactions placed in a interface

## Install
You shueld create a database for migration called "placetopay" or if you want to installe in other DB please edit .env file
- Run `composer install` to install the dependencies
- Run `php artisan migrate` ro run the migrations
- Run `php artisan queue:work` to run delayed job on bakcground
- Run `php artisan serve` for default the project will be runing on the port 8000

## Technologies:
- Laravel 5.6
- PHP 7
