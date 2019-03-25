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

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/inbox', 'MessageController@index')->name('inbox');

Route::post('menu', 'MenuController@show');

Route::get('getOptionGroupeUser', 'TlistGroupeUserController@getOptionGroupeUser')->name('getOptionGroupeUser');

Route::get('/license', function () { return view('license'); });