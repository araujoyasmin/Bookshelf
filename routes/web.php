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
    return view('welcome');
});


Route::get('/', 'HomeController@index')->name('index');

Route::get('login','Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('meus_livros', 'MyBooksController@index')->name('meus_livros');
Route::get('favoritos', 'MyBooksController@favoritos')->name('favoritos');
Route::get('lendo', 'MyBooksController@lendo')->name('lendo');
Route::get('queroler', 'MyBooksController@queroler')->name('queroler');
Route::get('abandonados', 'MyBooksController@abandonados')->name('abandonados');