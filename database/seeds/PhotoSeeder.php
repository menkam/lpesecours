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
        $object->date = '2019-02-18';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-02-20';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-02-22';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-03';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-03';
        $object->type = '2';
        $object->nombre = '1';
        $object->prix_unitaire = '300';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-04';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-06';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-07';
        $object->type = '1';
        $object->nombre = '4';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-09';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-14';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-15';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-18';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-22';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-24';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-25';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Photo();
        $object->date = '2019-03-31';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '900';
        $object->save();
    }
}
