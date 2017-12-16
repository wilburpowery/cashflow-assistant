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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/latest', 'DashboardController@latestStats');

    Route::patch('/users/{user}', 'UsersController@update');

    Route::get('/clients', 'ClientsController@index')->name('clients.index');
    Route::get('/clients/{client}', 'ClientsController@show')->name('clients.show');
    Route::post('/clients', 'ClientsController@store')->name('clients.store');
    Route::patch('/clients/{client}', 'ClientsController@update')->name('clients.update');
    Route::delete('/clients/{client}', 'ClientsController@destroy')->name('clients.destroy');

    Route::get('/incomes', 'IncomesController@index')->name('incomes.index');
    Route::get('/incomes/{income}', 'IncomesController@show')->name('incomes.show');
    Route::post('/incomes', 'IncomesController@store')->name('incomes.store');
    Route::patch('/incomes/{income}', 'IncomesController@update')->name('incomes.update');
    Route::delete('/incomes/{income}', 'IncomesController@destroy')->name('incomes.destroy');

    Route::get('/expenses', 'ExpensesController@index')->name('expenses.index');
    Route::get('/expenses/{expense}', 'ExpensesController@show')->name('expenses.show');
    Route::post('/expenses', 'ExpensesController@store')->name('expenses.store');
    Route::patch('/expenses/{expense}', 'ExpensesController@update')->name('expenses.update');
    Route::delete('/expenses/{expense}', 'ExpensesController@destroy')->name('expenses.destroy');

    Route::get('/payments', 'PaymentsController@index')->name('payments.index');
    Route::get('/payments/{payment}', 'PaymentsController@show')->name('payments.show');
    Route::post('/payments', 'PaymentsController@store')->name('payments.store');
    Route::patch('/payments/{payment}', 'PaymentsController@update')->name('payments.update');
    Route::delete('/payments/{payment}', 'PaymentsController@destroy')->name('payments.destroy');

    Route::get('/daily-budgets', 'DailyBudgetsController@index');
    Route::post('daily-budgets', 'DailyBudgetsController@store');

    Route::post('/desk-close', 'DeskClosesController@store');

    Route::get('/accounting/data', 'AccountingDataController');

    Route::middleware(['must-be-admin'])->group(function () {
        Route::get('/users', 'UsersController@index');
        Route::post('/users', 'UsersController@store');

        Route::get('/graphs/incomes', 'GraphsController@income');
    });
});

Route::get('{view}', 'HomeController@index')->where('view', '(.*)');
