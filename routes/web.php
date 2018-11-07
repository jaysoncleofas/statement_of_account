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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clients', 'ClientController@index')->name('client.index');
Route::resource('/client', 'ClientController')->except('index');

Route::get('/statement-of-account/all', 'StatementController@index')->name('statement.index');
Route::get('/statement-of-account/create', 'StatementController@create')->name('statement.create');
Route::get('/statement-of-account/{statement}', 'StatementController@show')->name('statement.show');
Route::post('/statement-of-account', 'StatementController@store')->name('statement.store');
Route::get('/statement-of-account/{statement}/edit', 'StatementController@edit')->name('statement.edit');
Route::put('/statement-of-account/{statement}', 'StatementController@update')->name('statement.update');
Route::delete('/statement-of-account/{statement}', 'StatementController@destroy')->name('statement.destroy');

Route::get('/statement-of-account/{statement}/view-1', 'StatementController@viewOne')->name('statement.viewOne');
Route::get('/statement-of-account/{statement}/view-2', 'StatementController@viewTwo')->name('statement.viewTwo');
Route::get('/statement-of-account/{statement}/view-3', 'StatementController@viewthree')->name('statement.viewThree');

Route::post('/particular/{statement}', 'ParticularController@store')->name('particular.store');
Route::delete('/particular/{particular}', 'ParticularController@destroy')->name('particular.destroy');