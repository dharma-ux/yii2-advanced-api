Yii 2 Advanced Project Template [ Basic Coding Test ]
===============================


DIRECTORY STRUCTURE
-------------------

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
