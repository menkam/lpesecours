<?php

use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Tlist_photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Photo();
        $object->date = 'SYSTE';
        $object->type = 'SYSTE';
        $object->nombre = 'Systeme';
        $object->prix_unitaire = 'Systeme';
        $object->save();
    }
}
