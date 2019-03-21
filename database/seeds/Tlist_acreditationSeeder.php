<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_acreditation;

class Tlist_acreditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_acreditation();
        $object->libelle = 'Lecture';
        $object->numero = '1';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'Ecriture';
        $object->numero = '2';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'Modification';
        $object->numero = '3';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'Desactivation';
        $object->numero = '4';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'Activition';
        $object->numero = '5';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'Suppression';
        $object->numero = '6';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'lecture-ecriture';
        $object->numero = '12';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'lect-ecrit-modif';
        $object->numero = '123';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'lect-ecrit-modif-desac';
        $object->numero = '1234';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'lect-ecrit-modif-desac-acti';
        $object->numero = '12345';
        $object->save();

        $object = new Tlist_acreditation();
        $object->libelle = 'lect-ecrit-modif-desac-acti-sup';
        $object->numero = '123456';
        $object->save();

    }
}
