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
        $object->groupeuser = '2';
        $object->rang = '1';
        $object->icon = 'cogs';
        $object->fichiercontroller = 'ApplicationController';
        $object->fichierview = 'Application';
        $object->save();

        $object = new Menu();
        $object->id = '2';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Utilisateurs';
        $object->groupeuser = '3';
        $object->rang = '2';
        $object->icon = 'user';
        $object->fichiercontroller = 'UserController';
        $object->fichierview = 'Utilisateurs';
        $object->save();

        $object = new Menu();
        $object->id = '3';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Groupe Utilisateurs';
        $object->groupeuser = '2';
        $object->rang = '3';
        $object->icon = 'users';
        $object->fichiercontroller = 'TlistGroupeUserController';
        $object->fichierview = 'GroupeUtilisateurs';
        $object->save();

        $object = new Menu();
        $object->id = '4';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Gestions';
        $object->groupeuser = '3';
        $object->rang = '4';
        $object->icon = 'folder';
        $object->fichiercontroller = 'GestionsController';
        $object->fichierview = 'Gestions';
        $object->save();

        $object = new Menu();
        $object->id = '5';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Contacts';
        $object->groupeuser = '4';
        $object->rang = '5';
        $object->lien = 'Contacts';
        $object->icon = 'contact';
        $object->route = 'contact';
        $object->controller = 'ContactController@index';
        $object->fichiercontroller = 'ContactController';
        $object->fichierview = 'Contacts';
        $object->save();

        $object = new Menu();
        $object->id = '6';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Messagerie';
        $object->groupeuser = '4';
        $object->rang = '6';
        $object->lien = 'Messagerie';
        $object->icon = 'inbox';
        $object->route = 'inbox';
        $object->controller = 'InboxController@index';
        $object->fichiercontroller = 'InboxController';
        $object->fichierview = 'Messagerie';
        $object->save();

        $object = new Menu();
        $object->id = '7';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Galeries';
        $object->groupeuser = '4';
        $object->rang = '7';
        $object->lien = 'Galeries';
        $object->icon = 'camera-retro';
        $object->route = 'galerie';
        $object->controller = 'GalerieController@index';
        $object->fichiercontroller = 'GalerieController';
        $object->fichierview = 'Galeries';
        $object->save();

        $object = new Menu();
        $object->id = '8';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Parametre';
        $object->groupeuser = '4';
        $object->rang = '8';
        $object->icon = 'cog';
        $object->fichiercontroller = 'ParametreController';
        $object->fichierview = 'Parametre';
        $object->save();

        $object = new Menu();
        $object->id = '9';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Apropos';
        $object->groupeuser = '4';
        $object->rang = '9';
        $object->lien = 'Apropos';
        $object->icon = 'certificate';
        $object->fichierview = 'Apropos';
        $object->save();

        $object = new Menu();
        $object->id = '11';
        $object->idparent = '1';
        $object->idfils = '2';
        $object->libelle = 'Maintenance';
        $object->groupeuser = '2';
        $object->rang = '1';
        $object->lien = 'Application\Maintenance';
        $object->icon = 'cog';
        $object->route = 'maintenance';
        $object->controller = 'ApplicationController@Maintenance';
        $object->fichierview = 'Maintenance';
        $object->save();

        $object = new Menu();
        $object->id = '21';
        $object->idparent = '2';
        $object->idfils = '2';
        $object->libelle = 'Nouveau Utilisateur';
        $object->groupeuser = '2';
        $object->rang = '1';
        $object->lien = 'Utilisateurs\Nouveau';
        $object->icon = 'pencil-square-o';
        $object->route = 'addUser';
        $object->controller = 'UserController@nouveau';
        $object->fichierview = 'NouveauUtilisateur';
        $object->save();

        $object = new Menu();
        $object->id = '22';
        $object->idparent = '2';
        $object->idfils = '2';
        $object->libelle = 'Modifier Utilisateur';
        $object->groupeuser = '3';
        $object->rang = '2';
        $object->lien = 'Utilisateurs\Modification';
        $object->icon = 'pencil-square-o';
        $object->route = 'updateUser';
        $object->controller = 'UserController@modification';
        $object->fichierview = 'ModifierUtilisateur';
        $object->save();

        $object = new Menu();
        $object->id = '31';
        $object->idparent = '3';
        $object->idfils = '2';
        $object->libelle = 'Nouveau Groupe Utilisateur';
        $object->groupeuser = '2';
        $object->rang = '1';
        $object->lien = 'GroupeUtilisateur\Nouveau';
        $object->icon = 'pencil-square-o';
        $object->route = 'addGroupeUser';
        $object->controller = 'TlistGroupeUserController@nouveau';
        $object->fichierview = 'NouveauGroupeUtilisateur';
        $object->save();

        $object = new Menu();
        $object->id = '32';
        $object->idparent = '3';
        $object->idfils = '2';
        $object->libelle = 'Modifier Groupe Utilisateur';
        $object->groupeuser = '3';
        $object->rang = '2';
        $object->lien = 'GroupeUtilisateur\Modification';
        $object->icon = 'pencil-square-o';
        $object->route = 'updateGroupeUser';
        $object->controller = 'TlistGroupeUserController@modification';
        $object->fichierview = 'ModifierGroupeUtilisateur';
        $object->save();

        $object = new Menu();
        $object->id = '41';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Cachets';
        $object->groupeuser = '3';
        $object->rang = '1';
        $object->fichierview = 'Cachets';
        $object->save();

        $object = new Menu();
        $object->id = '42';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Photos';
        $object->groupeuser = '3';
        $object->rang = '2';
        $object->fichierview = 'Photos';
        $object->save();

        $object = new Menu();
        $object->id = '43';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'MoMo';
        $object->groupeuser = '3';
        $object->rang = '3';
        $object->fichierview = 'MoMo';
        $object->save();

        $object = new Menu();
        $object->id = '44';
        $object->idparent = '4';
        $object->idfils = '2';
        $object->libelle = 'Personnelle';
        $object->groupeuser = '4';
        $object->rang = '4';
        $object->lien = 'Gestions\Personnelle';
        $object->icon = 'bookmark-o';
        $object->route = 'gestionPerso';
        $object->controller = 'GestionsController@personnelle';
        $object->fichierview = 'Personnelle';
        $object->save();

        $object = new Menu();
        $object->id = '81';
        $object->idparent = '8';
        $object->idfils = '2';
        $object->libelle = 'Profile';
        $object->groupeuser = '4';
        $object->rang = '1';
        $object->lien = 'Parametre\Profile';
        $object->icon = 'user';
        $object->route = 'profile';
        $object->controller = 'ParametreController@profile';
        $object->fichierview = 'Profile';
        $object->save();

        $object = new Menu();
        $object->id = '411';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Recettes Cachet';
        $object->groupeuser = '3';
        $object->rang = '1';
        $object->lien = 'Gestions\Cachet\Recettes';
        $object->icon = 'adjust';
        $object->route = 'recetteCachet';
        $object->controller = 'GestionsController@recetteCachet';
        $object->fichierview = 'RecettesCachet';
        $object->save();

        $object = new Menu();
        $object->id = '412';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Depenses Cachet';
        $object->groupeuser = '2';
        $object->rang = '2';
        $object->lien = 'Gestions\Cachet\Depenses';
        $object->icon = 'exchange';
        $object->route = 'depenseCachet';
        $object->controller = 'GestionsController@depenseCachet';
        $object->fichierview = 'DepensesCachet';
        $object->save();

        $object = new Menu();
        $object->id = '413';
        $object->idparent = '41';
        $object->idfils = '3';
        $object->libelle = 'Bilan Cachet';
        $object->groupeuser = '2';
        $object->rang = '3';
        $object->lien = 'Gestions\Cachet\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilanCachet';
        $object->controller = 'GestionsController@bilanCachet';
        $object->fichierview = 'BilanCachet';
        $object->save();

        $object = new Menu();
        $object->id = '421';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Recette Photo';
        $object->groupeuser = '3';
        $object->rang = '1';
        $object->lien = 'Gestions\Photos\Recettes';
        $object->icon = 'adjust';
        $object->route = 'recette';
        $object->controller = 'GestionsController@recettePhoto';
        $object->fichierview = 'RecettePhoto';
        $object->save();

        $object = new Menu();
        $object->id = '422';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Depense Photo';
        $object->groupeuser = '2';
        $object->rang = '2';
        $object->lien = 'Gestions\Photos\Depenses';
        $object->icon = 'exchange';
        $object->route = 'depense';
        $object->controller = 'GestionsController@depensePhoto';
        $object->fichierview = 'DepensePhoto';
        $object->save();

        $object = new Menu();
        $object->id = '423';
        $object->idparent = '42';
        $object->idfils = '3';
        $object->libelle = 'Bilan Photo';
        $object->groupeuser = '2';
        $object->rang = '3';
        $object->lien = 'Gestions\Photos\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilan';
        $object->controller = 'GestionsController@bilanPhoto';
        $object->fichierview = 'BilanPhoto';
        $object->save();

        $object = new Menu();
        $object->id = '431';
        $object->idparent = '43';
        $object->idfils = '3';
        $object->libelle = 'Recettes MoMo';
        $object->groupeuser = '3';
        $object->rang = '1';
        $object->lien = 'Gestions\MoMo\Recette';
        $object->icon = 'adjust';
        $object->route = 'recette';
        $object->controller = 'GestionsController@recetteMoMo';
        $object->fichierview = 'Recettes MoMo';
        $object->save();

        $object = new Menu();
        $object->id = '432';
        $object->idparent = '43';
        $object->idfils = '3';
        $object->libelle = 'Bilan MoMo';
        $object->groupeuser = '2';
        $object->rang = '2';
        $object->lien = 'Gestions\MoMo\Bilan';
        $object->icon = 'bar-chart-o';
        $object->route = 'bilan';
        $object->controller = 'GestionsController@bilanMoMo';
        $object->fichierview = 'BilanMoMo';
        $object->save();

    }
}