<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\AuthentificationController@login');
Route::post('/createCustomer', 'App\Http\Controllers\AuthentificationController@createCustomer');
Route::get('/getCustomer', 'App\Http\Controllers\AuthentificationController@getCustomer');

Route::post('/createTodo', 'App\Http\Controllers\TodoController@createTodo');
Route::get('/getTodo', 'App\Http\Controllers\TodoController@getTodo');