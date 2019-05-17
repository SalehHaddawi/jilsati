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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/','IndexController@index');

Route::get('/search','SearchController@index');

Route::resource('jilsahs','JilsahController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
