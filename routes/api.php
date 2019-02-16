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

Route::get('/questions', 'ApiController@index');
Route::get('/topics', 'ApiController@topics');
Route::get('/user/{user}', 'ApiController@show');
Route::get('/ranking', 'ApiController@ranking')

Route::post('/users', 'ApiController@store');
Route::post('/usercheck', 'ApiController@checkUser');

Route::get('/question/{question}/check', 'ApiController@checkAnswer');
