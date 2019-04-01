<?php

use Illuminate\Database\Seeder;
use App\Models\Cachet;
use App\Models\Tlist_cachet;

class CachetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Cachet();
        $object->id = '1';
        $object->date = '2019-01-08';
        $object->type = '2';
        $object->nombre = '1';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '2';
        $object->date = '2019-01-14';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '3';
        $object->date = '2019-01-17';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '2000';
        $object->save();

        $object = new Cachet();
        $object->id = '4';
        $object->date = '2019-01-18';
        $object->type = '4';
        $object->nombre = '1';
        $object->prix_unitaire = '5000';
        $object->save();

        $object = new Cachet();
        $object->id = '5';
        $object->date = '2019-01-21';
        $object->type = '7';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Cachet();
        $object->id = '6';
        $object->date = '2019-01-30';
        $object->type = '1';
        $object->nombre = '2';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '7';
        $object->date = '2019-02-02';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '8';
        $object->date = '2019-02-04';
        $object->type = '7';
        $object->nombre = '1';
        $object->prix_unitaire = '1000';
        $object->save();

        $object = new Cachet();
        $object->id = '9';
        $object->date = '2019-02-12';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '10';
        $object->date = '2019-02-14';
        $object->type = '6';
        $object->nombre = '1';
        $object->prix_unitaire = '5000';
        $object->save();

        $object = new Cachet();
        $object->id = '11';
        $object->date = '2019-02-14';
        $object->type = '5';
        $object->nombre = '1';
        $object->prix_unitaire = '5000';
        $object->save();

        $object = new Cachet();
        $object->id = '12';
        $object->date = '2019-02-14';
        $object->type = '2';
        $object->nombre = '1';
        $object->prix_unitaire = '2500';
        $object->save();

        $object = new Cachet();
        $object->id = '13';
        $object->date = '2019-02-19';
        $object->type = '2';
        $object->nombre = '1';
        $object->prix_unitaire = '3000';
        $object->save();

        $object = new Cachet();
        $object->id = '14';
        $object->date = '2019-02-19';
        $object->type = '6';
        $object->nombre = '1';
        $object->prix_unitaire = '4500';
        $object->save();

        $object = new Cachet();
        $object->id = '15';
        $object->date = '2019-03-14';
        $object->type = '4';
        $object->nombre = '1';
        $object->prix_unitaire = '4500';
        $object->save();

        $object = new Cachet();
        $object->id = '16';
        $object->date = '2019-03-16';
        $object->type = '1';
        $object->nombre = '1';
        $object->prix_unitaire = '3000';
        $object->save();

        $object = new Cachet();
        $object->id = '17';
        $object->date = '2019-03-19';
        $object->type = '2';
        $object->nombre = '1';
        $object->prix_unitaire = '4000';
        $object->save();
    }
}
