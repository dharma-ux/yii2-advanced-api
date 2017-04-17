Yii 2 Advanced Project Template [ Basic Coding Test ]
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Site API
-----

POST    /site/login     restful authentication

Input

```
{
    "username": "ram@mail.com",
    "password": "123456"
}
```

Output

```
{
  "success": true,
  "data": {
    "_id": "58f50a1d55ef6c059e0e4dd2",
    "email": "ram@mail.com",
    "password_hash": "$2y$13$YL.uGbZlOdnZDb38H9L0VezZ9TsEdjzozcL1J4zun4zTnkxZ/WyIW",
    "auth_key": "-_GIbWTlQsce1kia-cWcmiQVckgwgLXJ",
    "name": "ram",
    "dob": "2017-04-18",
    "country": "Nepal",
    "profession": "BE",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC95aWkyLWZyb250ZW5kLmRldiIsImF1ZCI6Imh0dHA6XC9cL3lpaTItZnJvbnRlbmQuZGV2IiwiaWF0IjoxNDkyNDUzOTE3LCJuYmYiOjE0OTI0NTM5MTcsInVpZCI6bnVsbCwiZXhwIjoxNDkzMzE3OTE3fQ.WeV74WoRhUd4zhthYwdkv2nY0C4Qh7o5SuX6Y8hqvjU",
    "status": 10,
    "role": "user",
    "created_at": 1492453917,
    "updated_at": 1492453917
  }
}
```

GET     /users          list all users

Headers: 

Authorization : Bearer {access_token} 


GET     users/{id}      returns the detail of user with {id}

Authorization : Bearer {access_token} 