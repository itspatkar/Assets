<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', function () {
    return "Hello World";
});

Route::post('/user', function () {
    return response()->json('POST API Called');
});

Route::delete('/user/{id}', function ($id) {
    return response($id, 200);
});

Route::put('/user/{id}', function ($id) {
    return response($id, 200);
});
