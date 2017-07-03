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
Route::get('/', 'DashboardController@index')	;
Route::resource('cars-management', 'CarsController');
Route::resource('dropoff-stores-management', 'DropoffStoresController');
Route::resource('items-management', 'ItemsController');
Route::resource('workers-management', 'WorkersController');
Route::resource('transactions', 'TransactionsController');