<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_photo;

class Tlist_photoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_photo();
        $object->code = 'STAN';
        $object->libelle = 'Photo 4x4';
        $object->save();

        $object = new Tlist_photo();
        $object->code = 'PERSO';
        $object->libelle = 'Photo Personnalise';
        $object->save();

    }
}
