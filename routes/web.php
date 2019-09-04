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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('load-orders/','LoadOrdersController@index')->name('load-orders.index');
Route::get('load-orders/create','LoadOrdersController@create')->name('load-orders.create');
Route::post('load-orders/store','LoadOrdersController@store')->name('load-orders.store');
Route::get('load-orders/{parameter}','LoadOrdersController@show')->name('load-orders.show');
Route::get('load-orders/{parameter}/edit','LoadOrdersController@edit')->name('load-orders.edit');
Route::put('load-orders/','LoadOrdersController@update')->name('load-orders.update');
Route::post('load-orders/','LoadOrdersController@destroy')->name('load-orders.destroy');
Route::resource('users','UserController');
Route::resource('clients','ClientsController');
Route::get('clients/{client}/cmr','ClientsController@cmr')->name('clients.cmr');
