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
Route::patch('/clients/{client}', 'ClientsController@update')->name('clients.update')->middleware('auth');
Route::delete('/clients/{client}', 'ClientsController@destroy')->name('clients.destroy')->middleware('auth');

Route::get('/incomes', 'IncomesController@index')->name('incomes.index')->middleware('auth');
Route::get('/incomes/{income}', 'IncomesController@show')->name('incomes.show')->middleware('auth');
Route::post('/incomes', 'IncomesController@store')->name('incomes.store')->middleware('auth');
Route::patch('/incomes/{income}', 'IncomesController@update')->name('incomes.update')->middleware('auth');
Route::delete('/incomes/{income}', 'IncomesController@destroy')->name('incomes.destroy')->middleware('auth');

Route::get('/expenses', 'ExpensesController@index')->name('expenses.index')->middleware('auth');
Route::get('/expenses/{income}', 'ExpensesController@show')->name('expenses.show')->middleware('auth');
Route::post('/expenses', 'ExpensesController@store')->name('expenses.store')->middleware('auth');
Route::patch('/expenses/{income}', 'ExpensesController@update')->name('expenses.update')->middleware('auth');
Route::delete('/expenses/{income}', 'ExpensesController@destroy')->name('expenses.destroy')->middleware('auth');

Route::get('{view}', 'HomeController@index')->where('view', '(.*)');
