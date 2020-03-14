<?php

use Illuminate\Http\Request;

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

Route::POST('register', 'Api\User\UserController@store');
Route::POST('login', 'Api\Auth\AuthController@login');
Route::get('users', 'Api\User\UserController@getAll');

Route::middleware('auth:api')->group(function () {
    Route::get('user/{userId}/details', 'Api\User\UserController@get');
    Route::get('user/all', 'Api\User\UserController@getAll');
    Route::get('user', 'Api\User\UserController@auth');
});
