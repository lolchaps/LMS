<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::singularResourceParameters();
Route::resource('books', 'BooksController');
Route::resource('borrows', 'BorrowController');
Route::resource('returns', 'ReturnController');

Route::get('reserved-books', 'ReserveController@index');
Route::get('reserved-books/{book}', 'ReserveController@store');
Route::get('reserved-books/{user}/update/{book}/{pivot}', 'ReserveController@update');

Route::get('returns/{user}/{book}/{pivot}', 'ReturnController@update');