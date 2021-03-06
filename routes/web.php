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

Route::get('/search','SearchController@index')->name('search');
Route::get('/about','AboutController@index')->name('about');
Route::get('/test','AboutController@test')->name('test');

Route::resource('jilsahs','JilsahController');

Route::post('/jilsahs/cities','JilsahController@getCities');
Route::post('/jilsahs/comment','JilsahController@saveComment');

Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');