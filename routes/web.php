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

    Route::get('config', 'ConceptionContoller@index')->name('name config');
    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('loadMenu', 'MenuController@show');
    Route::get('loadMenu', 'MenuController@show');

//Route::post('getOptionGroupeUser', 'TlistGroupeUserController@getOptionGroupeUser')->name('getOptionGroupeUser');
    Route::post('getOptionGroupeUser', ['as' => 'getOptionGroupeUser', 'uses' => 'TlistGroupeUserController@getOptionGroupeUser']);

    Route::get('/license', function () {
        return view('license');
    });

    /**
     * Menu
    */

    Route::get('contact', 'ContactController@index')->name('Contacts');
    Route::get('galerie', 'GalerieController@index')->name('Galeries');
    Route::get('maintenance', 'ApplicationController@Maintenance')->name('Maintenance');
    Route::get('addUser', 'UserController@nouveau')->name('Nouveau Utilisateur');
    Route::get('updateUser', 'UserController@modification')->name('Modifier Utilisateur');
    Route::get('addGroupeUser', 'TlistGroupeUserController@nouveau')->name('Nouveau Groupe Utilisateur');
    Route::get('updateGroupeUser', 'TlistGroupeUserController@modification')->name('Modifier Groupe Utilisateur');
    Route::get('gestionPerso', 'GestionsController@personnelle')->name('Personnelle');
    Route::get('recetteCachet', 'GestionsController@recetteCachet')->name('Recettes Cachet');
    Route::get('depenseCachet', 'GestionsController@depenseCachet')->name('Depenses Cachet');
    Route::get('bilanCachet', 'GestionsController@bilanCachet')->name('Bilan Cachet');
    Route::get('recette', 'GestionsController@recettePhoto')->name('Recette Photo');
    Route::get('depense', 'GestionsController@depensePhoto')->name('Depense Photo');
    Route::get('bilan', 'GestionsController@bilanPhoto')->name('Bilan Photo');
    Route::get('recette', 'GestionsController@recetteMoMo')->name('Recettes MoMo');
    Route::get('bilan', 'GestionsController@bilanMoMo')->name('Bilan MoMo');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('inbox', 'MessageController@index')->name('inbox');

});