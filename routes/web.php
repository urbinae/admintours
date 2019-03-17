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

Route::get('/front', 'FrontpageController@index');
Route::get('tures_front/{id}', 'FrontpageController@tures_front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
	
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	//Users
	Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('permission:users.create');

	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
	//Products
	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('permission:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('permission:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('permission:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('permission:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('permission:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('permission:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('permission:products.edit');

	//Reservas
	Route::get('reservas', 'ReservaController@index')->name('reservas.index')
		->middleware('permission:reservas.index');
	Route::get('reservas/{reserva}', 'ReservaController@show')->name('reservas.show')
		->middleware('permission:reservas.show');
	Route::get('reservas/{reserva}/edit', 'ReservaController@edit')->name('reservas.edit')
		->middleware('permission:reservas.edit');
	Route::delete('reservas/{reserva}', 'ReservasController@destroy')->name('reservas.destroy')
		->middleware('permission:reservas.destroy');
	Route::put('reservas/{reserva}', 'ReservaController@update')->name('reservas.update')
		->middleware('permission:reservas.edit');

	//tour
	Route::get('tours', 'TourController@index')->name('tours.index')
		->middleware('permission:tour.index');
	Route::get('tours/create', 'TourController@create')->name('tours.create')
		->middleware('permission:tours.create');
	Route::post('tours/store', 'TourController@store')->name('tours.store')
		->middleware('permission:tours.store');
	Route::get('tours/{tour}', 'TourController@show')->name('tours.show')
		->middleware('permission:tours.show');

	//cargar zonas
	Route::get('zonas', 'ZonaController@index')->name('zonas.index')
		->middleware('permission:zonas.index');
	Route::get('zonas/create', 'ZonaController@create')->name('zonas.create')
		->middleware('permission:zonas.create');
	Route::post('zonas/store', 'ZonaController@store')->name('zonas.store')
		->middleware('permission:zonas.store');
	Route::get('zonas/{tour}', 'ZonaController@show')->name('zonas.show')
		->middleware('permission:zonas.show');
	Route::post('zonas/{update}', 'ZonaController@update')->name('zonas.update')
		->middleware('permission:zonas.update');
		

     //Adultos
	Route::post('adults/store', 'AdultController@store')->name('adults.store')
		->middleware('permission:adults.store');
	Route::put('adults/{id}', 'AdultController@update')->name('adults.update')
		->middleware('permission:adults.update');

	//Children
	Route::post('children/store', 'ChildrenController@store')->name('children.store')
		->middleware('permission:children.store');
	Route::put('children/{id}', 'ChildrenController@update')->name('children.update')
		->middleware('permission:children.update');

	//Infantes
	Route::post('infants/store', 'InfantController@store')->name('infants.store')
		->middleware('permission:infants.store');
	Route::put('infants/{id}', 'InfantController@update')->name('infants.update')
		->middleware('permission:infants.update');

	//Buggies
	Route::post('buggies/store', 'BuggiesController@store')->name('buggies.store')
		->middleware('permission:buggies.store');
	Route::put('buggies/{id}', 'BuggiesController@update')->name('buggies.update')
		->middleware('permission:buggies.update');

	// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
});