<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_operation;

class Tlist_operationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_operation();
        $object->code = 'LEC';
        $object->libelle = 'Lecture';
        $object->save();

        $object = new Tlist_operation();
        $object->code = 'ECR';
        $object->libelle = 'Ecriture';
        $object->save();

        $object = new Tlist_operation();
        $object->code = 'MOD';
        $object->libelle = 'Modification';
        $object->save();

        $object = new Tlist_operation();
        $object->code = 'SUP';
        $object->libelle = 'Suppression';
        $object->save();

        $object = new Tlist_operation();
        $object->code = 'ACT';
        $object->libelle = 'Activation';
        $object->save();

        $object = new Tlist_operation();
        $object->code = 'DES';
        $object->libelle = 'Desactivation';
        $object->save();

    }
}
