# pseConnectionWithLaravel

Project to connect the PSE webservice and show all the transactions placed in a interface

## Install
You should create a database for the migrations called "placetopay" or if you want to install it in other DB please edit .env file
- Clone the this repository
- Run `cd pseConnectionWithLaravel` 
- Run `composer install` to install the dependencies
- Run `php artisan migrate` ro run the migrations
- Run `php artisan queue:work` to run delayed job on background **(run this job in a different command line)
- Run `php artisan serve` for default the project will be runing on the port 8000

## Technologies:
- Laravel 5.6
- PHP 7
