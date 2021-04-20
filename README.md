# UrlShorty - url shortener

## Docker
Docker and docker-compose are required for using this manual

## Installation

* Composer install `composer install` 

* Npm install and compile resources `npm i && npm run dev` 

* In the root directory create a `.env` file, or rename the `.env-example` file

* To forward mysql port, set in the `.env` file the FORWARD_DB_PORT to any port that's unused

## Start

    `vendor/bin/sail up`
