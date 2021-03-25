<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@index');
Route::post('/', 'AuthController@login');
Route::get('/password', 'AuthController@password');
Route::post('/password', 'AuthController@change');
Route::get('/logout', 'AuthController@logout');

Route::get('/dashboard', 'PollsController@index');
Route::get('/users', 'UsersController@index');
Route::get('/divisions', 'DivisionsController@index');
Route::get('/adddiv', 'DivisionsController@create');
Route::post('/adddiv', 'DivisionsController@store');
Route::get('/signin', 'UsersController@create');
Route::post('/signin', 'UsersController@store');
Route::get('/polls', 'PollsController@show');
Route::get('/add', 'PollsController@create');
Route::post('/add', 'PollsController@store');
Route::get('/result/{id}', 'PollsController@result');
Route::get('/mypoll', 'VotesController@index');
Route::get('/vote/{id}', 'VotesController@create');
Route::post('/vote', 'VotesController@store');
Route::delete('/poll/{id}', 'PollsController@destroy');
Route::delete('/users/{id}', 'UsersController@destroy');
Route::delete('/divisions/{id}', 'DivisionsController@destroy');
