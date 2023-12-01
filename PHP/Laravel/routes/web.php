<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

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

// Direct routing without function:
Route::view('/contact', 'contact');

// Routing subdirectory:
Route::get('/about', function () {
    return view('about.about');
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
Route::get('/param_keyval/', function () {
    $user = "Mandar";
    $system = "Void";
    return view('paramkv', ['user' => $user, 'system' => $system]);
});

// Pass data Route to View:
Route::get('/passwith/', function () {
    $user = "Mandar";
    $system = "Void";
    return view('passwith')->with('user', $user)->with('system', $system);
});
// Route::get('/passwith2/', function () { // Alternate
//     $user = "Mandar";
//     $system = "Void";
//     return view('passwith')
//         ->withUser($user)
//         ->withSystem($system);
// });

// Pass array:
Route::get('/passwitharray/', function () {
    $users = [
        1 => ['name' => 'Mandar', 'city' => 'Mumbai'],
        2 => ['name' => 'Aman', 'city' => 'Pune']
    ];
    return view('passwitharray')->with('users', $users);
});

function getUsers()
{
    return [
        1 => ['name' => 'Mandar', 'city' => 'Mumbai'],
        2 => ['name' => 'Aman', 'city' => 'Pune'],
        3 => ['name' => 'Akash', 'city' => 'Nashik']
    ];
}
Route::get('/printuser/{id}', function ($id) {
    $users = getUsers();
    abort_if(!isset($users[$id]), 404);
    $user = $users[$id];
    return view('printuser', ['id' => $user]);
})->name('printuser');

// Route Constraints:
Route::get('/param_con/{data}', function ($data) {
    return "<h2>Num: " . $data . "</h2>";
})->whereNumber('data');

Route::get('/param_in/{select}', function ($select) {
    return "<h2>Here is your: " . $select . "</h2>";
})->whereIn('select', ['tea', 'coffee', 'water']);

// Named route:
Route::get('/profile', function () {
    return view('view_profile');
})->name('profile');

// Redirect route:
Route::redirect('/contact-us', '/contact');

// Permanent redirection:
Route::redirect('/about-us', '/about', 301);

// Route Groups:
Route::prefix('services')->group(function () {
    Route::get('/create', function () {
        return view('services.create');
    });
    Route::get('/delete', function () {
        return view('services.delete');
    });
});

// Fallback route:
Route::fallback(function () {
    return "<h1>Error 404: File not found!</h1>";
});

// Blade Basics:
Route::get('/basic', function () {
    return view('basic');
});

// Directive: include
Route::get('/include', function () {
    return view('directives.main');
});

// Directive: inheritance
Route::get('/inherit', function () {
    return view('directives.inherit.home');
});
Route::get('/inherit/about', function () {
    return view('directives.inherit.about');
});
Route::get('/inherit/contact', function () {
    return view('directives.inherit.contact');
});

// JS in Blade:
Route::get('/js', function () {
    return view('jscript.js');
});
Route::get('/jsmain', function () {
    return view('jscript.main');
});
Route::get('/jspage', function () {
    return view('jscript.page');
});


// ----- Task 1 : Student Form -----
Route::get('/task1', function () {
    return view('task1.student');
});

Route::post('/task1', function (Request $request) {
    //dd($request->all());
    return $request->input('name');
})->name('submitForm');
