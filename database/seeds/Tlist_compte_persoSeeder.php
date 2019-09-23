<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_compte_perso;

class Tlist_compte_persoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_compte_perso();
        $object->code = 'EPG';
        $object->libelle = 'Epargne';
        $object->save();

        $object = new Tlist_compte_perso();
        $object->code = 'PRT';
        $object->libelle = 'Pret';
        $object->save();

        $object = new Tlist_compte_perso();
        $object->code = 'JNL';
        $object->libelle = 'Journalier';
        $object->save();
    }
}
