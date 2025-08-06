<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Livewire\AddNumbers;
use App\Livewire\Clicker;
use App\Livewire\Counter;
use App\Livewire\Form;
use App\Livewire\Greet;
use App\Livewire\Register;
use App\Livewire\Show;
use App\Livewire\Task;
use App\Livewire\TestDB;

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

// function getUsers()
// {
//     return [
//         1 => ['name' => 'Mandar', 'city' => 'Mumbai'],
//         2 => ['name' => 'Aman', 'city' => 'Pune'],
//         3 => ['name' => 'Akash', 'city' => 'Nashik']
//     ];
// }
Route::get('/printuser/{id}', function ($id) {
    $users = [
        1 => ['name' => 'Mandar', 'city' => 'Mumbai'],
        2 => ['name' => 'Aman', 'city' => 'Pune'],
        3 => ['name' => 'Akash', 'city' => 'Nashik']
    ];
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

// ----- Task 1 : Student Form -----
Route::get('/task1', function () {
    return view('task1.student');
});

Route::post('/task1', function (Request $request) {
    //dd($request->all());
    return $request->input('name');
})->name('submitForm');

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

// Controller:
Route::get('/welcome', [UserController::class, 'welcome']);
Route::get('/welcomeview', [UserController::class, 'welcomeView']);
Route::get('/greet', [UserController::class, 'greet'])->name('greet');

//Grouping common controller:
Route::controller(UserController::class)->group(function () {
    Route::get('/name/{name}', 'printName');
    Route::get('/name2/{name}', 'printNameF');
    Route::get('/namec/{name}', 'printCompact');
});

// Single Action Controller:
Route::get('/sac', SingleActionController::class);

// Query Builder: Read: get()
Route::get('/querybuilder', [UserController::class, 'showGet'])->name('index');

// Query Builder: Read: find()
Route::get('/querybuilder/read/{id}', [UserController::class, 'showFind'])->name('read');

// Query Builder: Create: insert()
Route::get('/querybuilder/storestatic', [UserController::class, 'storeStatic']);

// Query Builder: Create: insert()
Route::get('/querybuilder/updatestatic/{id}', [UserController::class, 'updateStatic']);

// Query Builder: Create: delete()
Route::get('/querybuilder/delete/{id}', [UserController::class, 'delete'])->name('delete');

// Query Builder: Create: truncate()
Route::get('/querybuilder/truncate', [UserController::class, 'truncate'])->name('truncate');

// Query Builder: Create Form
Route::view('/querybuilder/createform', 'querybuilder.create')->name('createform');

// Query Builder: Post method for create form:
Route::post('/querybuilder/create', [UserController::class, 'create'])->name('create');

// Query Builder: Update Form
Route::get('/querybuilder/updateform/{id}', [UserController::class, 'updateform'])->name('updateform');

// Query Builder: Post method for update form:
Route::post('/querybuilder/update/{id}', [UserController::class, 'update'])->name('update');

// Pagination:
Route::get('/querybuilder/pagination', [UserController::class, 'pagination']);


// Models - StudentController:
Route::get('/models', [StudentController::class, 'index'])->name('home');
Route::get('/models/show/{id}', [StudentController::class, 'show'])->name('showStudent');
Route::get('/models/create', [StudentController::class, 'create'])->name('createStudent'); // Components
Route::post('/models/store', [StudentController::class, 'store'])->name('storeStudent');
Route::get('/models/edit/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::post('/models/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::get('/models/delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');
Route::get('/models/deleteall', [StudentController::class, 'truncate'])->name('deleteAll');
Route::get('/models/importpage', [StudentController::class, "importpage"])->name('importPage');
Route::post('/models/import', [StudentController::class, "import"])->name('importStudents'); // Excel import
Route::get('/models/export', [StudentController::class, "export"])->name('exportStudents'); // Excel export
Route::get('/models/pdf/{id}', [StudentController::class, "pdf"])->name('generatePDF'); // Generate PDF

// Sessions:
Route::get('/session/get', function () {
    $session = session()->all();
    return $session;
});
Route::get('/session/set', function (Request $request) {
    $request->session()->put('username', 'Mandar');
    $request->session()->put('userid', '108');
    session()->flash('status', 'Success');

    return  redirect('/session/get');
});
Route::get('/session/destroy', function () {
    session()->forget('username');
    session()->forget('userid');

    return  redirect('/session/get');
});

// Middleware:
Route::view('/middleware/private', 'middleware.private')->middleware('access'); // Protected route
Route::view('/middleware/public', 'middleware.public'); // Unprotected route
Route::get('/unauth', function () {
    echo "You're not authorized to access this page!";
    die();
});
Route::get('/access/grant', function () {
    session()->put('auth', '1');
    return "Access Granted!";
});
Route::get('/access/revoke', function () {
    session()->forget('auth');
    return "Access Revoked!";
});
// Group Middleware:
Route::middleware(['mult'])->group(function () {
    Route::get('/private', [StudentController::class, 'index']);
    Route::view('/secret', 'middleware.secret');
});


// Authorization with Sessions & Middleware:
Route::get('/auth', [AuthController::class, 'index'])->name('auth')->middleware('authcon');
Route::get('/auth/loginpage', [AuthController::class, 'loginPage'])->name('login.page');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/registerpage', [AuthController::class, 'registerPage'])->name('register.page');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('authcon');
Route::get('/unauth', [AuthController::class, 'unauth'])->name('unauth');


// Livewire
Route::get('/livewire', function () {
    return view('livewire');
});

Route::get('/counter', Counter::class);
Route::get('/addnum', AddNumbers::class);
Route::get('/clicker', Clicker::class);
Route::get('/form', Form::class);
Route::get('/show', Show::class);
Route::get('/task', Task::class);
Route::get('/register', Register::class);
Route::get('/register', Register::class);

Route::get('/livewire/greet', Greet::class);
Route::view('/livewire/lw', 'lw');

Route::get('/lw/testdb',TestDB::class);
