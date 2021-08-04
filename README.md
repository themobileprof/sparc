<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/themobileprof/sparc/blob/main/public/img/logo.png" width="400"></a></p>


## sparc.africa API

This is the SPARC API and Backend built on Laravel. To deploy locally, follow the steps below:

### Requirements
Install:
- PHP
- Composer
- NPM
- A database (MySQl or SQLite recommended)

### Deployment Steps

- Clone this repo to your system

```
git clone https://github.com/themobileprof/sparc.git
```

From inside the cloned folder, continue the following steps:
- Copy .env.example to .env, and edit the database details to connect to your database
- Run `php artisan key:generate` to generate a new Application Key
- Run `composer install` to install PHP dependencies
- Run `npm install` to install JavaScript dependencies
- Run `php artisan migrate` to migrate the database schema to your database
- Run `php artisan serve` to start the PHP server

Open your browser to **http://localhost:8000** and click on ***register*** to start registration

## API Access

The API route is at **http://localhost:8000/api/**
### Registration and Login API
To get the Bearer Tokens you need to access API content
- api/auth/register
- api/auth/login
- api/auth/logout

### API Resources:
- api/countries
Verb | URI | Description
---- | --- | ------
GET | /countries | List all
POST | /countries | Save an Item
GET | /countries/{country} | Show an Item
PUT/PATCH | /countries/{country} | Update an Item
DELETE | /countries/{country} | Delete an Item
- context_entries
Verb | URI | Description
---- | --- | ------
GET | /context_entries | List all
POST | /context_entries | Save an Item
GET | /context_entries/{context} | Show an Item
PUT/PATCH | /context_entries/{context} | Update an Item
DELETE | /context_entries/{context} | Delete an Item
- component_entries
Verb | URI | Description
---- | --- | ------
GET | /component_entries | List all
POST | /component_entries | Save an Item
GET | /component_entries/{component} | Show an Item
PUT/PATCH | /component_entries/{component} | Update an Item
DELETE | /component_entries/{component} | Delete an Item
- sponsors
Verb | URI | Description
---- | --- | ------
GET | /sponsors | List all
POST | /sponsors | Save an Item
GET | /sponsors/{sponsor} | Show an Item
PUT/PATCH | /sponsors/{sponsor} | Update an Item
DELETE | /sponsors/{sponsor} | Delete an Item
- purchasing_functions
Verb | URI | Description
---- | --- | ------
GET | /purchasing_functions | List all
POST | /purchasing_functions | Save an Item
GET | /purchasing_functions/{functions} | Show an Item
PUT/PATCH | /purchasing_functions/{functions} | Update an Item
DELETE | /purchasing_functions/{functions} | Delete an Item

PS: To list all end points, run `php artisan route:list`

