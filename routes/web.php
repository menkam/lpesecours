<?php

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/license', function () { return view('license'); });
Route::get('apropos', function () { return view('Apropos'); });

Route::get('test', 'ConceptionContoller@test')->name('test');

Auth::routes();

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
Route::group(['middleware' => ['auth']], function () {

    Route::get('maintenance', 'ConceptionContoller@index')->name('maintenance');
    Route::get('/home', 'HomeController@index')->name('home');


//Route::post('getOptionGroupeUser', 'TlistGroupeUserController@getOptionGroupeUser')->name('getOptionGroupeUser');




    /*
     * Formulaire
     */
    Route::post('saveRecetteMomo', 'GestionsController@saveRecetteMomo')->name('saveRecetteMomo');
    Route::post('saveRecettePhoto', 'GestionsController@saveRecettePhoto')->name('saveRecettePhoto');
    Route::post('saveRecetteCachet', 'GestionsController@saveRecetteCachet')->name('saveRecetteCachet');

    Route::post('updateRecetteMomo', 'GestionsController@updateRecetteMomo')->name('updateRecetteMomo');
    Route::post('updateRecettePhoto', 'GestionsController@updateRecettePhoto')->name('updateRecettePhoto');
    Route::post('updateRecetteCachet', 'GestionsController@updateRecetteCachet')->name('updateRecetteCachet');

    Route::post('deleteRecetteMomo', 'GestionsController@deleteRecetteMomo')->name('deleteRecetteMomo');
    Route::post('deleteRecettePhoto', 'GestionsController@deleteRecettePhoto')->name('deleteRecettePhoto');
    Route::post('deleteRecetteCachet', 'GestionsController@deleteRecetteCachet')->name('deleteRecetteCachet');


    Route::post('loadContentUpdateBilan', 'GestionsController@loadContentUpdateBilan')->name('loadContentUpdateBilan');

    /**
     * Option Menu
     */
    Route::post('getOptionTypePhoto', ['as' => 'getOptionTypePhoto', 'uses' => 'GestionsController@getOptionTypePhoto']);
    Route::post('getOptionTypeCachet', ['as' => 'getOptionTypeCachet', 'uses' => 'GestionsController@getOptionTypeCachet']);


    /**
     * Menu
    */
    Route::get('contact', 'ContactController@index')->name('Contacts');
    Route::get('galerie', 'GalerieController@index')->name('Galeries');
    //Route::get('maintenance', 'ApplicationController@Maintenance')->name('Maintenance');
    Route::get('addUser', 'UserController@nouveau')->name('Nouveau Utilisateur');
    Route::get('updateUser', 'UserController@modification')->name('Modifier Utilisateur');
    Route::get('addGroupeUser', 'TlistGroupeUserController@nouveau')->name('Nouveau Groupe Utilisateur');
    Route::get('updateGroupeUser', 'TlistGroupeUserController@modification')->name('Modifier Groupe Utilisateur');

    Route::get('depenseCachet', 'GestionsController@depenseCachet')->name('Depenses Cachet');
    Route::get('depense', 'GestionsController@depensePhoto')->name('Depense Photo');
    Route::get('recettePhoto', 'GestionsController@recettePhoto')->name('Recette Photo');
    Route::get('recetteMoMo', 'GestionsController@recetteMoMo')->name('Recettes MoMo');
    Route::get('recetteCachet', 'GestionsController@recetteCachet')->name('Recettes Cachet');
    Route::get('bilanPhoto', 'GestionsController@bilanPhoto')->name('Bilan Photo');
    Route::get('bilanMoMo', 'GestionsController@bilanMoMo')->name('Bilan MoMo');
    Route::get('bilanCachet', 'GestionsController@bilanCachet')->name('Bilan Cachet');
    Route::get('gestionPerso', 'GestionsController@personnelle')->name('Personnelle');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('inbox', 'MessageController@index')->name('inbox');


});