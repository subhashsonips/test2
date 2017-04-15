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
Route::get('/','\App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
Route::get('/dashboard','DashboardController@index');
Route::get('/dashboard/success','DashboardController@success');









Route::get('/{id}/settings/{ngo_id}','SettingsController@settings');
Route::post('/{id}/settings/settingupdate','SettingsController@settingupdate');

Route::get('/{id}/change-password/{ngo_id}','SettingsController@changepassword');
Route::post('/{id}/change-password/password-update','SettingsController@passwordupdate');



Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');





Route::get('error', 'errorController@index');
Auth::routes();


/*Route::get('/', function () {
    return view('welcome');
});*/
