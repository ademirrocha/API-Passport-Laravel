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

Route::POST('register', 'Api\Auth\AuthController@register');
Route::POST('login', 'Api\Auth\AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::get('user/{userId}/details', 'Api\User\UserController@show');
    Route::get('user', 'Api\User\UserController@auth');
});
