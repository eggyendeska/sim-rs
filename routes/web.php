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

Route::get('/', function () {
    return view('login');
});

	// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('user/register', 'Auth\RegisterController@register');

	// Dashboard Routes... 
	Route::get('/home', 'HomeController@index')->name('home');

	// User Routes... 
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');
	
	// Obat Routes...
	Route::get('/obat', 'ObatController@index')->name('obat');
	Route::get('/obat/create', 'ObatController@create')->name('obat.create');
	Route::post('/obat', 'ObatController@store')->name('obat.store');
	Route::get('/obat/{id}', 'ObatController@show')->name('obat.show');
	Route::get('/obat/{id}/edit', 'ObatController@edit')->name('obat.edit');
	Route::put('/obat/{id}', 'ObatController@update')->name('obat.update');
	Route::get('/obat/{id}/destroy', 'ObatController@destroy')->name('obat.destroy');
	
	// 