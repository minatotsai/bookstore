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

Route::get('/', 'BooksController@index')->name('books');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'LoginController@index')->name('login');

Route::get('/books', 'BooksController@index')->name('books');
Route::get('books/{class}/show', 'BooksController@show')->name('books/show');
Route::get('books/{class}/create', 'BooksController@create')->name('books/create');
Route::get('carts', 'CartsController@index')->name('carts');
Route::get('carts/{id}/edit', 'CartsController@edit')->name('carts/edit');
Route::get('carts/{id}/destroy', 'CartsController@destroy')->name('carts/destroy');
Route::get('images', 'ImagesController@index')->name('images');
Route::get('images/{id}/show', 'ImagesController@show')->name('images/show');
//Route::get('imagesEdit', 'ImagesController@edit')->name('imagesEdit');
Route::post('images/edit', 'ImagesController@edit')->name('images/edit');