<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route index/root to welcome:
Route::get('/', function () {
    return view('welcome');
});

// Route /home to home:
Route::get('/home', function () {
    return view('home');
});

// Return HTML without view:
Route::get('/test', function () {
    return "<h1>This is test!</h1>";
});

// Without function direct routing:
Route::view('/contact', 'contact');

Route::get('/about', function () {
    return view('about.about');
});


Route::get('/student', function () {
    return view('student');
});

// Routing parameters:
Route::get('/param/{name}', function ($data) {
    return "<h2>Param: " . $data . "</h2>";
});

// Routing optional parameters:
Route::get('/param_op/{name?}', function (string $data = null) {
    if ($data) {
        return "<h2>Data received: " . $data . "</h2>";
    } else {
        return "<h2>No data received!</h2>";
    }
});

// Routing multiple parameters:
Route::get('/param_mul/{name}/id/{id}', function ($data, $id) {
    return "<h2>Name: " . $data . "</h2><h2>ID: " . $id . "</h2>";
});

// Routing parameters as key-value pair:
Route::get('/param_keyval/{name}', function ($data) {
    return view('param', ['name' => $data]);
});

// Route Constraints:
Route::get('/param_con/{data}', function ($data) {
    return "<h2>Num: " . $data . "</h2>";
})->whereNumber('data');

Route::get('/param_in/{select}', function ($select) {
    return "<h2>Here is your: " . $select . "</h2>";
})->whereIn('select', ['tea', 'coffee', 'water']);



Route::get('/form', function () {
    return view('index');
});

Route::post('/form', function () {
    return "Hello";
})->name('submitform');
