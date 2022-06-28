# Currency Converter

## Steps to run project locally

* Clone repository
* Set up local host with at least PHP 7.4 which points to project public folder
* Create MySQL database for the project
* Copy `.env.example` as `.env` and alter it to match your configuration:
    * Database connection settings
    * `APP_URL` should match your created host
    * Generate `APP_KEY` with the help of `php artisan key:generate`
* Install necessary dependencies:
    * `composer install`
    * `npm install`
* Run database migrations with `php artisan migrate`
* Build front end with `npm run dev`

## Possible improvements to the project

* At the moment front end allows users to input anything into crypto input field, but this could be improved by
  synchronizing available cryptocurrencies in the exchange on daily basis and storing them in the database. This would
  allow front end to load this list and to provide select field with autocomplete functionality. This also would allow
  back end to validate selected cryptocurrency before making API call.
