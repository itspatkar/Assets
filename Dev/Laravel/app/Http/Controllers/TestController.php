<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function mandar()
    {
        return "mandar";
    }
}


// Controller:
// - Class based php files
// - Group related request handle in one single class.
// - In btw view and model
// - Use to handle business logic

// Types of Controller:
// - Basic Controllers - it has only one class and we need to define all things in it by yourself.
// php artisan make:controller controllerName

// - Single Action Controllers
// php artisan make:controller SingleActionController --invokable

// - Resource Controllers -handle crud operation, create built in functions, routes
// php artisan make:controller ResourceController --resource

// Components in Laravel: Used for optimization
// php artisan make:component Input

// Database Configuration and Migration
// php artisan migrate

// For clearing Cache
// php artisan config:cache
