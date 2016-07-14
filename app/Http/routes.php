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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::singularResourceParameters();
Route::resource('/books', 'BooksController');
Route::resource('/borrows', 'BorrowController');

Route::get('returns/{user}/{book}', 'ReturnController@update');