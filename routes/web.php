<?php
Route::singularResourceParameters();
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
Auth::routes(['verify' => true]);

Route::get('/license', function () { return view('license'); });
Route::get('apropos', function () { return view('Apropos'); });
Route::get('bloquer', function () { return view('bloquer'); });

Route::post('testpost', 'ConceptionContoller@testpost')->name('testpost');
Route::post('listMenu', 'MenuContoller@listMenu')->name('listMenu');

Route::get('galerie', 'GalerieController@index')->name('Galeries');


/*
 * utilisateur déconnecté
 */
Route::group(['middleware' => ['guest']], function() {
    Route::get('/', 'WelcomeController@index')->name('welcome');
    /*Route::get('/', function () {
        //return view('welcome');
        return view('auth.login');
    });*/
});

/*
 * utilisateur connecté
 */
Route::group(['middleware' => ['auth']], function () {

    /*
    * Visiteur
    */
    Route::group(['middleware' => ['visiteur']], function() {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::post('calculatrice', 'GestionsController@calculatrice')->name('calculatrice');
        /**
         * Option Menu
         */
        Route::post('getOptionTypePhoto', ['as' => 'getOptionTypePhoto', 'uses' => 'GestionsController@getOptionTypePhoto']);
        Route::post('getOptionTypeCachet', ['as' => 'getOptionTypeCachet', 'uses' => 'GestionsController@getOptionTypeCachet']);
        Route::get('contact', 'ContactController@index')->name('Contacts');
        Route::get('gestionPerso', 'GestionsController@personnelle')->name('Personnelle');
        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::get('inbox', 'MessageController@index')->name('inbox');

    });

    /*
        * Membre
        */
    Route::group(['middleware' => ['membre']], function() {

    });

    /*
    * Personnel
    */
    Route::group(['middleware' => ['personnel']], function() {

        Route::post('saveRecetteGlobalMomo', 'GestionsController@saveRecetteGlobalMomo')->name('saveRecetteGlobalMomo');
        Route::post('saveRecetteMomo', 'GestionsController@saveRecetteMomo')->name('saveRecetteMomo');
        Route::post('saveRecettePhoto', 'GestionsController@saveRecettePhoto')->name('saveRecettePhoto');
        Route::post('saveRecetteCachet', 'GestionsController@saveRecetteCachet')->name('saveRecetteCachet');
        
        Route::get('depenseCachet', 'GestionsController@depenseCachet')->name('Depenses Cachet');
        Route::get('depense', 'GestionsController@depensePhoto')->name('Depense Photo');
        Route::get('recettePhoto', 'GestionsController@recettePhoto')->name('Recette Photo');
        Route::get('recetteMoMo', 'GestionsController@recetteMoMo')->name('Recettes MoMo');
        Route::get('recetteCachet', 'GestionsController@recetteCachet')->name('Recettes Cachet');

    });

    /*
    * Administrateur
    */
    Route::group(['middleware' => ['admin']], function() {

        Route::get('maintenance', 'ConceptionContoller@index')->name('maintenance');
        Route::get('menus', 'ApplicationController@menus')->name('menus');
        Route::get('test', 'ConceptionContoller@test')->name('test');
        Route::get('addUser', 'UserController@nouveau')->name('Nouveau Utilisateur');
        Route::get('updateUser', 'UserController@modification')->name('Modifier Utilisateur');
        Route::get('addGroupeUser', 'TlistGroupeUserController@nouveau')->name('Nouveau Groupe Utilisateur');
        Route::get('updateGroupeUser', 'TlistGroupeUserController@modification')->name('Modifier Groupe Utilisateur');
        Route::post('updateStatutBilan', 'GestionsController@updateStatutBilan')->name('updateStatutBilan');


        Route::get('bilanPhoto', 'GestionsController@bilanPhoto')->name('Bilan Photo');
        Route::get('bilanMoMo', 'GestionsController@bilanMoMo')->name('Bilan MoMo');
        Route::get('bilanCachet', 'GestionsController@bilanCachet')->name('Bilan Cachet');

        Route::post('loadBodyBilan', 'GestionsController@loadBodyBilan')->name('loadBodyBilan');

        Route::post('loadContentModalView', 'ModalController@loadContentModalView')->name('loadContentModalView');
        Route::post('loadContentModalUpdate', 'ModalController@loadContentModalUpdate')->name('loadContentModalUpdate');
        Route::post('loadContentModalDelete', 'ModalController@loadContentModalDelete')->name('loadContentModalDelete');

        Route::post('saveModalUpdate', 'ModalController@saveModalUpdate')->name('saveModalUpdate');

        Route::post('listMenu', 'ApplicationController@listMenu')->name('listMenu');

        Route::post('updateRecetteMomo', 'GestionsController@updateRecetteMomo')->name('updateRecetteMomo');
        Route::post('updateRecettePhoto', 'GestionsController@updateRecettePhoto')->name('updateRecettePhoto');
        Route::post('updateRecetteCachet', 'GestionsController@updateRecetteCachet')->name('updateRecetteCachet');

        Route::post('deleteRecetteMomo', 'GestionsController@deleteRecetteMomo')->name('deleteRecetteMomo');
        Route::post('deleteRecettePhoto', 'GestionsController@deleteRecettePhoto')->name('deleteRecettePhoto');
        Route::post('deleteRecetteCachet', 'GestionsController@deleteRecetteCachet')->name('deleteRecetteCachet');

    });

});