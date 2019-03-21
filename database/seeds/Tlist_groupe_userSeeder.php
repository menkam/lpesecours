<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_groupe_user;

class Tlist_groupe_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_groupe_user();
        $object->code = 'SYSTE';
        $object->libelle = 'Systeme';
        $object->save();

        $object = new Tlist_groupe_user();
        $object->code = 'ADMIN';
        $object->libelle = 'Administrateur';
        $object->save();

        $object = new Tlist_groupe_user();
        $object->code = 'PERSO';
        $object->libelle = 'Personnel';
        $object->save();

        $object = new Tlist_groupe_user();
        $object->code = 'MEBRE';
        $object->libelle = 'membre';
        $object->save();

        $object = new Tlist_groupe_user();
        $object->code = 'VSTER';
        $object->libelle = 'Visiteur';
        $object->save();

        $object = new Tlist_groupe_user();
        $object->code = 'BLOQU';
        $object->libelle = 'Bloquer';
        $object->save();
    }
}
