<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_ope_gestion;
use App\Models\Ope_user_gale;

class Tlist_ope_gestionSeeder extends Seeder
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
        $id = $object->save();

    }
}
