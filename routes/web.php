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
Route::redirect('/home', '/');
Route::get('load-orders/','LoadOrdersController@index')->name('load-orders.index');
Route::get('load-orders/list','LoadOrdersController@listOrders')->name('load-orders.list-orders');
Route::delete('load-orders/{parameter}','LoadOrdersController@destroy')->name('load-orders.destroy');
Route::get('load-orders/create','LoadOrdersController@create')->name('load-orders.create');
Route::get('load-orders/filter/{filter}','LoadOrdersController@filter')->name('load-orders.filter');
Route::get('load-orders/get-filter/{filter}','LoadOrdersController@getFilter')->name('load-orders.getFilter');
Route::post('load-orders/store','LoadOrdersController@store')->name('load-orders.store');
Route::get('load-orders/{parameter}','LoadOrdersController@show')->name('load-orders.show');
Route::get('load-orders/{parameter}/edit','LoadOrdersController@edit')->name('load-orders.edit');
Route::get('load-orders/pending/cars/{carsPending}','LoadOrdersController@pending')->name('load-orders.pending-cars');
Route::post('load-orders/pending/select-cars','LoadOrdersController@pendingCars')->name('load-orders.pending-select-cars');
Route::get('load-orders/pending-api/cars/{carsPending}','LoadOrdersController@pendingApiCars')->name('load-orders.pending-api-cars');
Route::put('load-orders/{parameter}','LoadOrdersController@update')->name('load-orders.update');
Route::resource('users','UserController');
Route::resource('clients','ClientsController');
Route::resource('services','ServicesController');
Route::get('load-orders/{loadOrders}/cmr','LoadOrdersController@cmr')->name('load-orders.cmr');
Route::get('bills/load-order/{loadOrder}','BillsController@showBillLoadOrder')->name('bills.show-bill-load-order');
Route::resource('bills','BillsController');
Route::get('bills/load-order-api/{loadOrder}','BillsController@billLoadOrder');
