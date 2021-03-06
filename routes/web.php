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
    return view('Layouts/LayoutFull');
});

Route::get('/teste','TesteController@index'); /*indicando a rota dessa url amigável*/

Route::resource('/client','Clients\ClientController')->names('clients');

Route::resource('/book', 'Books\BookController')->names('books');