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



Route::middleware("auth:api")->group(function () {
    Route::get('/user', "UserController@getUser");
    Route::post("logout", 'AuthController@logout');
});



Route::post('user', "UserController@store");
Route::get('morphone', "TestController@morphOne");
Route::get('morphmany', "TestController@morphMany");
Route::get('morphtomany', "TestController@morphManyToMany");

Route::post('minio', "TestController@minio");


Route::get('test/{id}', "TestController@index");
Route::post('login', "AuthController@login");

Route::post('signup', 'UserController@signup');
Route::get('signup/activate/{token}', 'UserController@signupActivate');



Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});


