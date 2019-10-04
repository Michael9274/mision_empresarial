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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('rentals', 'RentalController@saveRentals')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'DashboardController@index')->name('admin.home');
    Route::get('/alquiler', 'RentalsAdminController@index')->name('alquiler');

    Route::resource('usuarios', 'UserAdminController')->except([
        'show'
    ]);
    Route::resource('libros', 'BookAdminController')->except([
        'create', 'show', 'edit'
    ]);
});
