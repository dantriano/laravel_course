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

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/login', 'LoginController@login')->name('login');
//Route::post('/login', 'LoginController@login')->name('login');

Route::get('/products', 'ProductController@list');
Route::post('/products/addToChart', 'ProductController@addToChart');

Route::get('/products/new', 'ProductController@new');
//Para el formulario. definimos la accion de save cuando se envia el formulario
Route::post('/products/new', 'ProductController@save');

//Route::get('/axios', 'ProductController@list');

