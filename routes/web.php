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

/**
 * API_ROUTES
 */
Route::get('api_login', function(){
    $date = array('token' => '457822_menkam', 'name' => 'MENKAM');
    return json_encode('457822_menkam');
});

Route::get('api_getMenus', 'api\ApiController@getMenus')->name('api_getMenus');
Route::get('api_getListMomo', 'api\ApiController@getListMomo')->name('getListMomo');
Route::get('api_getInfoCompte/{id}', 'api\ApiController@getInfoCompte')->name('getInfoCompte');

Route::get('api_newCompteMomo/{date}/{fond}/{pret}/{espece}/{comptemomo}/{compteperso}/{commission}/', 'api\ApiController@newCompteMomo')->name('newCompteMomo');
Route::get('api_updateCompteMomo/{date}/{fond}/{pret}/{espece}/{comptemomo}/{compteperso}/{commission}/', 'api\ApiController@updateCompteMomo')->name('updateCompteMomo');





Auth::routes();
Auth::routes(['verify' => false]);

Route::get('/php', function () { 
    $phpinfo = 'ras';
    $phpinfo = phpinfo();
    dd($phpinfo); 
});
Route::get('/license', function () { return view('license'); });
Route::get('apropos', function () { return view('Apropos'); });
Route::get('bloquer', function () { return view('bloquer'); });

Route::post('testpost', 'ConceptionContoller@testpost')->name('testpost');
Route::get('testget', 'ConceptionContoller@testpost')->name('testget');
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

        Route::post('existRecordComptePerso', 'Compte_persoController@existRecordComptePerso')->name('existRecordComptePerso');
        Route::post('saveComptePerso', 'Compte_persoController@saveComptePerso')->name('saveComptePerso');
        Route::post('updateComptePerso', 'Compte_persoController@updateComptePerso')->name('updateComptePerso');
        Route::post('sendMessage', 'MessageController@sendMessage')->name('sendMessage');
        Route::post('showInfoNav', 'MessageController@showInfoNav')->name('showInfoNav');
        Route::post('readInbox', 'MessageUserController@readInbox')->name('readInbox');
        Route::post('loadMessageContent', 'MessageUserController@loadMessageContent')->name('loadMessageContent');
        Route::post('loadListMessage', 'MessageUserController@loadListMessage')->name('loadListMessage');

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


        
        Route::get('depenseCachet', 'GestionsController@depenseCachet')->name('Depenses Cachet');
        Route::get('depense', 'GestionsController@depensePhoto')->name('Depense Photo');


        Route::get('bilanPhoto', 'GestionsController@bilanPhoto')->name('Bilan Photo');
        Route::get('bilanMoMo', 'GestionsController@bilanMoMo')->name('Bilan MoMo');
        Route::get('bilanCachet', 'GestionsController@bilanCachet')->name('Bilan Cachet');

        Route::post('getSommeMonnaie', 'MonnaieController@getSommeMonnaie')->name('getSommeMonnaie');

    });

    /*
    * Administrateur
    */
    Route::group(['middleware' => ['admin']], function() {

        Route::post('/uploads', 'ConceptionContoller@uploads')->name('uploads');

        Route::get('maintenance', 'ConceptionContoller@index')->name('maintenance');
        Route::get('menus', 'ApplicationController@menus')->name('menus');
        Route::get('test', 'ConceptionContoller@test')->name('test');
        Route::get('addUser', 'UserController@nouveau')->name('Nouveau Utilisateur');
        Route::get('updateUser', 'UserController@modification')->name('Modifier Utilisateur');
        Route::get('addGroupeUser', 'TlistGroupeUserController@nouveau')->name('Nouveau Groupe Utilisateur');
        Route::get('updateGroupeUser', 'TlistGroupeUserController@modification')->name('Modifier Groupe Utilisateur');
        Route::post('updateStatutBilan', 'GestionsController@updateStatutBilan')->name('updateStatutBilan');




        Route::get('recettePhoto', 'GestionsController@recettePhoto')->name('Recette Photo');
        Route::get('recetteMoMo', 'GestionsController@recetteMoMo')->name('Recettes MoMo');
        Route::get('recetteCachet', 'GestionsController@recetteCachet')->name('Recettes Cachet');

        Route::post('loadBodyBilan', 'GestionsController@loadBodyBilan')->name('loadBodyBilan');

        Route::post('loadContentModalView', 'ModalController@loadContentModalView')->name('loadContentModalView');
        Route::post('loadContentModalAdd', 'ModalController@loadContentModalAdd')->name('loadContentModalAdd');
        Route::post('loadContentModalUpdate', 'ModalController@loadContentModalUpdate')->name('loadContentModalUpdate');
        Route::post('loadContentModalDelete', 'ModalController@loadContentModalDelete')->name('loadContentModalDelete');

        Route::post('saveModalAdd', 'ModalController@saveModalAdd')->name('saveModalAdd');
        Route::post('saveModalUpdate', 'ModalController@saveModalUpdate')->name('saveModalUpdate');

        Route::post('listMenu', 'ApplicationController@listMenu')->name('listMenu');
        Route::post('uploadFichierCSV', 'ApplicationController@uploadFichierCSV')->name('uploadFichierCSV');
        Route::post('uploadDataBase', 'ApplicationController@uploadDataBase')->name('uploadDataBase');
        Route::get('uploadDataBase', 'ApplicationController@uploadDataBase')->name('uploadDataBase');
        Route::get('downloadDataBase', 'ApplicationController@downloadDataBase')->name('downloadDataBase');
        Route::get('updateGestion', 'GestionsController@updateGestion')->name('updateGestion');
        Route::get('saveGestion', 'GestionsController@saveGestion')->name('saveGestion');

        Route::post('updateRecetteMomo', 'GestionsController@updateRecetteMomo')->name('updateRecetteMomo');
        Route::post('updateRecettePhoto', 'GestionsController@updateRecettePhoto')->name('updateRecettePhoto');
        Route::post('updateRecetteCachet', 'GestionsController@updateRecetteCachet')->name('updateRecetteCachet');

        Route::post('deleteRecetteMomo', 'GestionsController@deleteRecetteMomo')->name('deleteRecetteMomo');
        Route::post('deleteRecettePhoto', 'GestionsController@deleteRecettePhoto')->name('deleteRecettePhoto');
        Route::post('deleteRecetteCachet', 'GestionsController@deleteRecetteCachet')->name('deleteRecetteCachet');

        Route::post('saveRecetteGlobalMomo', 'GestionsController@saveRecetteGlobalMomo')->name('saveRecetteGlobalMomo');
        Route::post('saveRecetteMomo', 'GestionsController@saveRecetteMomo')->name('saveRecetteMomo');
        Route::post('saveRecettePhoto', 'GestionsController@saveRecettePhoto')->name('saveRecettePhoto');
        Route::post('saveRecetteCachet', 'GestionsController@saveRecetteCachet')->name('saveRecetteCachet');

    });

});