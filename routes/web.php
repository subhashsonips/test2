<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','ProjectsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('clients','ClientsController');
Route::resource('projects','ProjectsController');
Route::resource('tasks','TasksController');
Route::resource('team','TeamsController');
Route::resource('/work/team-work','TeamWorkController');
