# UrlShorty - url shortener

## Docker
Docker and docker-compose are required for using this manual

## Installation

* Composer install `composer install` 

* Npm install and compile resources `npm i && npm run dev` 

* In the root directory copy and rename the `.env.example` file to `.env`

* Set APP_PORT in the `.env` file to any port thats unused (eg. 8080)

* Optional: To forward mysql port, set in the `.env` file the FORWARD_DB_PORT to any port that's unused

* Optional: create alias sail="vendor/bin/sail" in ~/.bashrc

## Start
 
* `vendor/bin/sail up` or `sail up`

## Generate App key
* `vendor/bin/sail artisan key:generate` or `sail artisan key:generate`
## Migrate and seed

* `vendor/bin/sail artisan migrate --seed` or `sail artisan migrate --seed`
