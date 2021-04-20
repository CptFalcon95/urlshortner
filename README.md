# UrlShorty - url shortener

## Docker
Docker and docker-compose are required for using this manual

## Installation

* Composer install `composer install` 

* Npm install and compile resources `npm i && npm run dev` 

* In the root directory create a `.env` file, or rename the `.env-example` file

* Set APP_PORT in the `.env` file to any port thats unused (eg. 8080)

* To forward mysql port, set in the `.env` file the FORWARD_DB_PORT to any port that's unused

## Start
* Optional: create alias sail="vendor/bin/sail" in ~/.bashrc
 
* `vendor/bin/sail up` or `sail up`
## Migrate and seed

* `vendor/bin/sail artisan migrate --seed` or `sail artisan migrate --seed`
