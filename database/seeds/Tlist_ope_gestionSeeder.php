<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_ope_gestion;

class Tlist_ope_gestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_ope_gestion();
        $object->code = 'GESMO';
        $object->libelle = 'Mobile Money';
        $object->save();

        $object = new Tlist_ope_gestion();
        $object->code = 'GESCA';
        $object->libelle = 'Cachet';
        $object->save();

        $object = new Tlist_ope_gestion();
        $object->code = 'GESPH';
        $object->libelle = 'Photo';
        $object->save();

    }
}
