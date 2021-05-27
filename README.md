# Vue Material Dashboard - API Laravel

# Laravel API Setup

## Introduction

JSON:API is a specification for how a client should request that resources be fetched or modified, and how a server should respond to those requests. It is designed to minimize both the number of requests and the amount of data transmitted between clients and servers. This efficiency is achieved without compromising readability, flexibility, or discoverability.

[Click here to go to the JSON:API docs](https://explore.postman.com/api/6357/laravel-jsonapi)

## Prerequisites

### JSON:API backend
The Laravel JSON:API backend project requires a proper multi-threaded web server such as Apache/Nginx environment with PHP, Composer and MySQL.

**Do not use `php artisan serve` as it will result in stalled requests due to the single-threaded nature of the built-in PHP web server.** 

We strongly recommend using [Laradock](https://laradock.io/) for Linux and Mac or [Laragon](https://laragon.org/download/) for Windows if possible.

Other options for your local environment:
- Windows: [How to install WAMP on Windows](https://updivision.com/blog/post/beginner-s-guide-to-setting-up-your-local-development-environment-on-windows)
- Linux: [How to install LAMP on Linux](https://howtoubuntu.org/how-to-install-lamp-on-ubuntu)
- Mac: [How to install MAMP on MAC](https://wpshout.com/quick-guides/how-to-install-mamp-on-your-mac/)

You will also need to install Composer 2: [https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md)

### Vue Material frontend
The Vue Material frontend project requires a working local environment with NodeJS version 8.9 or above (8.11.0+ recommended), npm, VueCLI.

Install Node: https://nodejs.org/ (version 8.11.0+ recommended)

Install NPM: https://www.npmjs.com/get-npm

Install VueCLI: https://cli.vuejs.org/guide/installation.html

## Laravel JSON:API Project Installation

1. Navigate in your Laravel API project folder: `cd your-laravel-json-api-project`
2. Install project dependencies: `composer install`
3. Create a new .env file: `cp .env.example .env`
3. Add your own database credentials in the .env file in DB_DATABASE, DB_USERNAME, DB_PASSWORD
5. Create users table: `php artisan migrate --seed`
6. Generate application key: `php artisan key:generate`
7. Install Laravel Passport: `php artisan passport:install`
8. Add your own mailtrap.io credentials in MAIL_USERNAME and MAIL_PASSWORD in the .env file

## Vue Material Dashboard Project Installation

1. Navigate to your Vue Dashboard project folder:  `cd your-vue-material-dashbord-project`
2. Install project dependencies: `npm install`
3. Create a new .env file: `cp .env.example .env`
4. `VUE_APP_BASE_URL` should contain the URL of your Vue Material Dashboard Project (eg. http://localhost:8080/)
5. `VUE_APP_API_BASE_URL` should contain the URL of your Laravel JSON:API Project. (eg. http://localhost:3000/api/v1)
6. Run `npm run dev` to start the application in a local development environment or `npm run build`  to build release distributables.



## Usage

### Login

Register a user or login using admin@jsonapi.com and secret and start navigate throught the page.

Endpoint:

* ``` $URL_BASE_BACKEND + /api/v1/login ```  Login
* ``` $URL_BASE_BACKEND + /api/v1/register ``` Register
* ``` $URL_BASE_BACKEND + /api/v1/logout ``` Logout

* ``` $URL_BASE_FRONTEND + /admin ```  Login
* ``` $URL_BASE_FRONTEND + /register ``` Register


To login into dashboard you just have to add **$URL_BASE_FRONTEND/admin** in the URL and fill the login form with the credentials (user: **admin@jsonapi.com** and password: **secret**, it's set by default).

The login in Vue component which handles the login functinality it uses the auth store located in `vue-material-dashboard\src\store\modules\auth.js`.

### Posts


Publish aany post in the root (**URL_BASE_FRONTEND/**) inside the dasboard **URL_BASE_FRONTEND/dashboard**. This is the admin site where you can create, edit and delete any post as you want. The delete not disable the post, it deletes the data from database, you need to be careful with that. You only can edit the title, content and the status from the post. There is three status: Published, draft and inactive. Just the post with the "published" status can be seen in the root (**URL_BASE_FRONTEND/**) and  also the last five. The other post can be seen in the table in the same dashboard.



* ``` $URL_BASE_BACKEND + /api/v1/posts/create ```  Create post (Need authentication)
* ``` $URL_BASE_BACKEND + /api/v1/posts/update/{id} ``` Update post (Need authentication)
* ``` $URL_BASE_BACKEND + /api/v1/posts/delete/{id} ``` Delete post (Need authentication)
* ``` $URL_BASE_BACKEND + /api/v1/posts/all ``` See all post (Need authentication)
* ``` $URL_BASE_BACKEND + /api/v1/posts ``` See just the post with "Published" status.


* ``` $URL_BASE_FRONTEND + /dashboard ```  Dashboard (Need authentication)

The page has token authentication (Bearer authentication) that is an HTTP authentication scheme that involves security tokens called bearer tokens. The name “Bearer authentication” can be understood as “give access to the bearer of this token.” The bearer token is a cryptic string, usually generated by the server in response to a login request. The client must send this token in the Authorization header when making requests to protected resources

### Tips Run project with docker and laradock - Ubuntu

Commands (Ubuntu console):

Inside the folder /laradock run:

If you want to up the service:

``` docker-compose up -d nginx mysql ```

You can change nginx for whatever you want such as apache, and mysql for another database such as postgres, sqlite, etc... Remember to release the ports of those tools before lifting docker.

If you want to down the service:

``` docker-compose down -v ```

if you want to open any specific container:

``` docker exec -it laradock_workspace_1 bash ```

See a demo: screenrecord.mp4


### References 

Material design [Tim Creative] (https://www.creative-tim.com/product/material-dashboard)
[VueJS] (https://vuejs.org)
[Laravel] (https://laravel.com/)
[JsonApi] (https://jsonapi.org/)