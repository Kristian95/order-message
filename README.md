# Laravel Orders

## Installation

Setting up your development environment on your local machine :
```bash
$ git clone https://github.com/Kristian95/order-message.git
$ cd order-message
$ cp .env.example .env
$ php artisan migrate
$ php artisan serve
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

## Basic Usages
```bash
$ Hitting http://localhost:8000 you will get two list of messages and search
$ Hitting http://localhost:8000/notification will send SMS to the user and store the text and status message in DB
```
