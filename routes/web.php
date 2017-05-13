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

use Illuminate\Http\Request;

Route::get('/', 'TasksController@index');
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
Route::post('/task', 'TasksController@add');

Route::get('/tasks/{task}/edit', 'TasksController@edit');
Route::patch('/tasks/{task}', 'TasksController@update');

Route::get('/tasks/complete/{task}','TasksController@completeForm');
Route::patch('/tasks/complete/{task}','TasksController@complete');

Route::delete('/task/{task}', 'TasksController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show');
