<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_message;

class Tlist_messageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_message();
        $object->code = 'TCH';
        $object->libelle = 'Tchat';
        $object->save();

        $object = new Tlist_message();
        $object->code = 'ALT';
        $object->libelle = 'Alert';
        $object->save();

        $object = new Tlist_message();
        $object->code = 'Dif';
        $object->libelle = 'Diffussion';
        $object->save();

        $object = new Tlist_message();
        $object->code = 'ANO';
        $object->libelle = 'Annonce';
        $object->save();

    }
}
