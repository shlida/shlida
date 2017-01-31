# Jeban Laravel

## Stack Detail
- PHP7
- MariaDB + phpMyAdmin

## Required before Install
- npm@4.1.2 or Latest
- node@v7.4.0 or Latest

## Installing guide
- Clone repo and get in project folder
- Run `composer update` and `npm install` (Make sure npm & node are new version)
- Run `cp .env.example .env`
- Run `php artisan key:generate`

## Start working
- Run `docker-compose up`
### While docker running
- New tab and run `docker exec -it lamp-dev /bin/bash`
- Here, you can run any `php artisan <command>` in bash

## Try connect database
- open browser enter `localhost:8080/pma` for phpMyAdmin
- user : **root** , password : **NULL** (blank password)
- create new database name **jeban** collation **utf8mb4_unicode_ci**
- edit .env file
~~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jeban
DB_USERNAME=root
DB_PASSWORD=
~~~~
- test connection : open browser go to `localhost:8080/testDbConnection`

## for Frontend Dev mode
wanna background watch sass & vuejs run `npm run watch`
wanna build once run `npm run dev` < this way do once per change made
