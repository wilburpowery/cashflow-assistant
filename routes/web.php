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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('businesses', 'BusinessesController@store')->name('businesses.store');

Route::get('/clients', 'ClientsController@index')->name('clients.index')->middleware('auth');
Route::get('/clients/{id}', 'ClientsController@show')->name('clients.show')->middleware('auth');
Route::post('/clients', 'ClientsController@store')->name('clients.store')->middleware('auth');

Route::get('/incomes', 'IncomesController@index')->name('incomes.index')->middleware('auth');
Route::get('/incomes/{income}', 'IncomesController@show')->name('incomes.show')->middleware('auth');
Route::post('/incomes', 'IncomesController@store')->name('incomes.store')->middleware('auth');
Route::patch('/incomes/{income}', 'IncomesController@update')->name('incomes.update')->middleware('auth');
Route::delete('/incomes/{income}', 'IncomesController@destroy')->name('incomes.destroy')->middleware('auth');

Route::get('{view}', 'HomeController@index')->where('view', '(.*)');
