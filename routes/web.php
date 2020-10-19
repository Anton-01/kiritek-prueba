<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Ruta para los libros
Route::get('/books/{page?}', 'BookController@index')->name('books');
Route::get('/books/details/{id}', 'BookController@show')->name('books.show');

Route::get('/books/create', 'BookController@create');
Route::post('/books/store', 'BookController@store')->name('books.store');

//Ruta para los comentarios
Route::post('/comments/store', 'CommentController@store')->name('comments.store');
