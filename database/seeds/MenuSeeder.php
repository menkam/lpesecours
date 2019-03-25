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
        $object->libelle = 'Utilisateurs';
        $object->lien = 'Users';
        $object->icon = 'users';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '11';
        $object->idparent = '1';
        $object->idfils = '2';
        $object->libelle = 'Nouveau';
        $object->lien = 'Utilisateurs/Nouveau';
        $object->route = 'NewUser';
        $object->icon = 'add';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '12';
        $object->idparent = '1';
        $object->idfils = '2';
        $object->libelle = 'Modifier';
        $object->lien = 'Utilisateurs/Modifier';
        $object->route = 'UpdateUser';
        $object->icon = 'add';
        $object->position = '2';
        $object->save();

        $object = new Menu();
        $object->id = '2';
        $object->idparent = '0';
        $object->idfils = '1';
        $object->libelle = 'Test0';
        $object->lien = 'Test0';
        $object->icon = 'Test0';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '21';
        $object->idparent = '2';
        $object->idfils = '2';
        $object->libelle = 'test1';
        $object->lien = 'Test0/Test1';
        $object->icon = 'add';
        $object->position = '1';
        $object->save();

        $object = new Menu();
        $object->id = '211';
        $object->idparent = '21';
        $object->idfils = '3';
        $object->libelle = 'test2';
        $object->lien = 'Test0/Test1/Test2';
        $object->route = 'test2';
        $object->icon = 'add';
        $object->position = '1';
        $object->save();
    }
}