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
Route::group(['middleware' => ['web']], function () {
    Auth::routes();

    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/inbox', 'MessageController@index')->name('inbox');

    Route::post('loadMenu', 'MenuController@show');
    Route::get('loadMenu', 'MenuController@show');

//Route::post('getOptionGroupeUser', 'TlistGroupeUserController@getOptionGroupeUser')->name('getOptionGroupeUser');
    Route::post('getOptionGroupeUser', ['as' => 'getOptionGroupeUser', 'uses' => 'TlistGroupeUserController@getOptionGroupeUser']);

    Route::get('/license', function () {
        return view('license');
    });

});