# Codaemon Softwares URL Shortener Test By Omprakash Lilhare

Requires PHP ≥ 5.6.0 or higher.

## About Application

1. This application is developed on laravel framework.
2. Laravel is a web application framework with expressive, elegant syntax. We believe development must be an 	 enjoyable and creative experience to be truly fulfilling. 
Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

	1.Simple, fast routing engine.
	2.Powerful dependency injection container.
	3.Multiple back-ends for session and cache storage.
	4.Expressive, intuitive database ORM.
	5.Database agnostic schema migrations.
	6.Robust background job processing.
	7.Real-time event broadcasting.

## Installation

Create any folder and open command prompt terminal.

cd folder_name.

git clone git@github.com:omi9404/codaemonTestOm.git

##Go to downloaded project folder.
cd codaemonTestOm 

composer install

##Generate autoload files
composer dump-autoload

##Database Setup
6.Make database 'urlshortener'
5.Database Username : root
  Database Password : ''

## Installation continue..
##Make laravel baseic table and view files
php artisan make:auth

##Generate application needed tables

php artisan migrate

##Start Server
php artisan serve



## You are ready to go
  
6.A message will appear 'Laravel development server started: <http://127.0.0.1:8000>'
7.Hit the url 'http://127.0.0.1:8000' (Note:make sure your server is on as well as phpmyadmin.)






