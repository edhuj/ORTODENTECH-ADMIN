<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/create', 'QuestionController@create');
Route::post('/questions', 'QuestionController@store');
Route::get('/questions/{question}', 'QuestionController@show');

Route::get('/users', 'UserController@index');
Route::get('/ranking', 'UserController@ranking');

Route::get('/answers', 'AnswerController@index');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');

Route::get('/locations', 'LocationController@index');
Route::get('/signum', 'LocationController@showMap');
