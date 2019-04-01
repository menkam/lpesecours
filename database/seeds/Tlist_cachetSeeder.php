<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_cachet;


class Tlist_cachetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_cachet();
        $object->code = 'CAREC';
        $object->libelle = 'Cachet rectangle';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CARON';
        $object->libelle = 'Cachet Rond';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CANOM';
        $object->libelle = 'Cachet Nominatif';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAREB';
        $object->libelle = 'Cachet rectangle & Boitier';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAROB';
        $object->libelle = 'Cachet Rond & Boitier';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CANOB';
        $object->libelle = 'Cachet Nominatif & Boitier';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAPAY';
        $object->libelle = 'Cachet Paye Comptant';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CALIV';
        $object->libelle = 'Cachet Livre';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CANLI';
        $object->libelle = 'Cachet Non Livre';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CACOP';
        $object->libelle = 'Cachet Copie';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAORG';
        $object->libelle = 'Cachet Original';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAMUL';
        $object->libelle = 'Cachet Multiple';
        $object->save();

        $object = new Tlist_cachet();
        $object->code = 'CAAUT';
        $object->libelle = 'Autre Cachet';
        $object->save();

    }
}
