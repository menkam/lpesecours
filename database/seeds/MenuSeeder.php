<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Menu();
        $object->id = '1';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Application';
        $object->lien = '';
        $object->icon = 'cogs';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '2';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '2';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Utilisateurs';
        $object->lien = '';
        $object->icon = 'user';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '3';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '3';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Groupe Utilisateurs';
        $object->lien = '';
        $object->icon = 'users';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '2';
        $object->position = '3';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '4';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Gestions';
        $object->lien = '';
        $object->icon = 'folder';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '3';
        $object->position = '4';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '5';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Contacts';
        $object->lien = 'Contacts';
        $object->icon = 'contact';
        $object->route = 'contact';
        $object->controller = 'ContactController@index';
        $object->groupeuser = '4';
        $object->position = '5';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '6';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Messagerie';
        $object->lien = 'Messagerie';
        $object->icon = 'inbox';
        $object->route = 'inbox';
        $object->controller = 'InboxController@index';
        $object->groupeuser = '4';
        $object->position = '6';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '7';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Galeries';
        $object->lien = 'Galeries';
        $object->icon = 'camera-retro';
        $object->route = 'galerie';
        $object->controller = 'GalerieController@index';
        $object->groupeuser = '4';
        $object->position = '7';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '8';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Parametre';
        $object->lien = '';
        $object->icon = 'cog';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '4';
        $object->position = '8';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '9';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Apropos';
        $object->lien = 'Apropos';
        $object->icon = 'certificate';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '4';
        $object->position = '9';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '11';
        $object->idparent = '1';
        $object->idfils = '2';
        $object->libelle = 'Maintenance';
        $object->lien = 'Application\Maintenance';
        $object->icon = 'cog';
        $object->route = 'maintenance';
        $object->controller = 'ApplicationController@Maintenance';
        $object->groupeuser = '2';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '21';
        $object->idparent = '2';
        $object->idfils = '2';
        $object->libelle = 'Nouveau Utilisateur';
        $object->lien = 'Utilisateurs\Nouveau';
        $object->icon = 'pencil-square-o';
        $object->route = 'addUser';
        $object->controller = 'UserController@nouveau';
        $object->groupeuser = '2';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '22';
        $object->idparent = '2';
        $object->idfils = '2';
        $object->libelle = 'Modifier Utilisateur';
        $object->lien = 'Utilisateurs\Modification';
        $object->icon = 'pencil-square-o';
        $object->route = 'updateUser';
        $object->controller = 'UserController@modification';
        $object->groupeuser = '3';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '31';
        $object->idparent = '3';
        $object->idfils = '2';
        $object->libelle = 'Nouveau Groupe Utilisateur';
        $object->lien = 'GroupeUtilisateur\Nouveau';
        $object->icon = 'pencil-square-o';
        $object->route = 'addGroupeUser';
        $object->controller = 'TlistGroupeUserController@nouveau';
        $object->groupeuser = '2';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '32';
        $object->idparent = '3';
        $object->idfils = '2';
        $object->libelle = 'Modifier Groupe Utilisateur';
        $object->lien = 'GroupeUtilisateur\Modification';
        $object->icon = 'pencil-square-o';
        $object->route = 'updateGroupeUser';
        $object->controller = 'TlistGroupeUserController@modification';
        $object->groupeuser = '3';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '41';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Cachets';
        $object->lien = '';
        $object->icon = '';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '3';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '42';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Photos';
        $object->lien = '';
        $object->icon = '';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '3';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '43';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'MoMo';
        $object->lien = '';
        $object->icon = '';
        $object->route = '';
        $object->controller = '';
        $object->groupeuser = '3';
        $object->position = '3';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '44';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Personnelle';
        $object->lien = 'Gestions\Personnelle';
        $object->icon = 'bookmark-o';
        $object->route = 'gestionPerso';
        $object->controller = 'GestionController@personnelle';
        $object->groupeuser = '4';
        $object->position = '4';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '81';
        $object->idparent = '8';
        $object->idfils = '2';
        $object->libelle = 'Profile';
        $object->lien = 'Parametre\Profile';
        $object->icon = 'user';
        $object->route = 'profile';
        $object->controller = 'ParametreController@profile';
        $object->groupeuser = '4';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '411';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Recettes Cachet';
        $object->lien = 'Gestions\Cachet\Recettes';
        $object->icon = 'adjust';
        $object->route = 'recetteCachet';
        $object->controller = 'GestionsController@recetteCachet';
        $object->groupeuser = '3';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '412';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Depenses Cachet';
        $object->lien = 'Gestions\Cachet\Depenses';
        $object->icon = 'exchange';
        $object->route = 'depenseCachet';
        $object->controller = 'GestionsController@depenseCachet';
        $object->groupeuser = '2';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '413';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Bilan Cachet';
        $object->lien = 'Gestions\Cachet\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilanCachet';
        $object->controller = 'GestionsController@bilanCachet';
        $object->groupeuser = '2';
        $object->position = '3';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '421';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Recette Photo';
        $object->lien = 'Gestions\Photos\Recettes';
        $object->icon = 'adjust';
        $object->route = 'recette';
        $object->controller = 'GestionsController@recettePhoto';
        $object->groupeuser = '3';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '422';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Depense Photo';
        $object->lien = 'Gestions\Photos\Depenses';
        $object->icon = 'exchange';
        $object->route = 'depense';
        $object->controller = 'GestionsController@depensePhoto';
        $object->groupeuser = '2';
        $object->position = '2';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '423';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Bilan Photo';
        $object->lien = 'Gestions\Photos\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilan';
        $object->controller = 'GestionsController@bilanPhoto';
        $object->groupeuser = '2';
        $object->position = '3';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '431';
        $object->idparent = '43';
        $object->idfils = '3';
        $object->libelle = 'Recettes MoMo';
        $object->lien = 'Gestions\MoMo\Recette';
        $object->icon = 'adjust';
        $object->route = 'recette';
        $object->controller = 'GestionsController@recetteMoMo';
        $object->groupeuser = '3';
        $object->position = '1';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '432';
        $object->idparent = '43';
        $object->idfils = '3';
        $object->libelle = 'Bilan MoMo';
        $object->lien = 'Gestions\MoMo\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilan';
        $object->controller = 'GestionsController@bilanMoMo';
        $object->groupeuser = '2';
        $object->position = '2';
        $object->position = '1';
        $object->save();
    }
}