<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Laravel BEDeveloper Task with steps

BEDeveloper task covered CRUD operation of REST API with ordring system on based of points increment and decrement. This task done in laravel PHP framework. In this task, there are covered mainly pages in Controller, Model, Healer, Test feature.

To install and proceed with this task need to follow below steps:

Step 1 : First take git clone at your local folder by using code clone URL.

Step 2 : after sucessfully done cloning folow below commands.

            - cd BEDeveloper-Urvi
            - composer install
    Note: Composer install will add all required packages as per package.json
    
Step 3 : Add .env file copy from .env.example and add your new database name in .env's database config.

Step 4 : After adding database, run migration with below command 

            - php artisan migrate
                OR
            - For specific file: php artisan migrate --path=database/migrations/2023_09_01_182454_create_lists_table.php
            
Step 5 : Now, start to run your project on teminal with below command which start your port 8000 intially if you not define any port.

            - php artisan serve
            - For specific port: php artisan serve --port=8081 
            
Now, finally, you can run all rest api's path as per given below:

    1) POST method Request URL for storing list User: http://your terminal ip:port/api/v1/lists
    2) GET method Requset for display each list user: http://<your terminal ip:port>/api/v1/lists/{id} 
    3) GET method Requset for display all list users: http://<your terminal ip:port>/api/v1/lists
    4) PUT/PETCH method Requset for display each list user. Here body parameter point=1 means addition of points 
    and parameter point=2 means substraction of points of each user : 
    http://<your terminal ip:port>/api/v1/lists/{id}?points=1 OR http://<your terminal ip:port>/api/v1/lists/{id}?points=2
    5) DELETE method request for soft delete each user: http://<your terminal ip:port>/api/v1/lists/{id}
Run above URLs with mentioned method request.

Step 6: For run test file use below command for run specific test file:

        - php artisan test --filter=ListTest
        - OR you can run only => php artisan test

## Explanation with end points with local URL:
	
1) POST : http://127.0.0.1:8000/api/v1/lists : Uses For store details into list table of database with below body parameters:
     
    {
        "name":"Urvi Patel",
        "birth_date":"01-09-1991",
        "address":"SK, Canada"
    }
    - Other parameter points, age, order will added from controller logic.

2) GET : http://127.0.0.1:8000/api/v1/lists/{id} : Uses For get each List users details with id

3) GET : http://127.0.0.1:8000/api/v1/lists : Uses For get all List users details 

4) PUT/PETCH : http://127.0.0.1:8000/api/v1/lists/{id}?points=1 OR http://127.0.0.1:8000/api/v1/lists/{id}?points=2 : Uses For update points of passed id list users with URL parameter points. Points 1 define addition and Points 2 define subtraction. After point update re-order function will works and highest points list user gets first priority and other gets respective order as per points.

5) DELETE : http://127.0.0.1:8000/api/v1/lists/{id} : For delete uses soft delete. With id list user will be deleted.

With above steps project will successfully. Below are the things about Laravel default read details. 
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. 

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
