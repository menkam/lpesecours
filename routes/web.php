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
Route::get('/profile',['as'=>'profile','uses'=>'ProfileController@index']);
Route::get('/inbox',['as'=>'inbox','uses'=>'MessageController@index']);
Route::get('/license', function () { return view('license'); });

Route::resource('forms','FormController');

Route::post('getOptionGroupeUser',['as'=>'getOptionGroupeUser','uses'=>'TlistGroupeUserController@getOptionGroupeUser']);