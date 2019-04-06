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

    }
}
