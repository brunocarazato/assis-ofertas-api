# Slim Framework 4 Skeleton Application - AssisOfertasAPI
Slim is a PHP micro framework that helps you quickly write simple yet powerful web applications and APIs. At its core, Slim is a dispatcher that receives an HTTP request, invokes an appropriate callback routine, and returns an HTTP response. That’s it.

Slim is an ideal tool to create APIs that consume, repurpose, or publish data. Slim is also a great tool for rapid prototyping. Heck, you can even build full-featured web applications with user interfaces. More importantly, Slim is super fast and has very little code.

Configuration files:
* app/routes
* app/repositories
* app/settings

Project Source Files are inside _src_ folder

## Install the Application

Required PHP 7.3 or newer.

Run the following command to install the dependencies.

```bash
php composer.phar install
```

To run the application in development, you can run these commands 

```bash
php composer.phar start
```

After that, open `http://localhost:8080` in your browser.


That's it! Now go build something cool.

## Creating the database

First, in app/settings.php file you will find database standard settings. So, to get it simple, you have to create a database with the same name, user, password and collection type.


The actual database is small, but we need to figure out how to keep the code below updated:

```sql
CREATE TABLE promocao(
    id int PRIMARY KEY AUTO_INCREMENT,
    produto varchar(255) NOT NULL,
    categoria int NOT NULL,
    fotoPromocao varchar(255) NOT NULL,
    dataIni DATETIME NOT NULL,
    dataFim DATETIME NOT NULL,
    ativa boolean DEFAULT TRUE
);

CREATE TABLE user(
    id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    senha varchar(255) NOT NULL,
    nome varchar(255) NOT NULL
);
```
