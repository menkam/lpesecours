<?php

use Illuminate\Database\Seeder;
use App\Models\Tlist_devise;


class Tlist_deviseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new Tlist_devise();
        $object->libelle = 'Dix Mille FCFA';
        $object->valeur = '10000';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Cinq Mille FCFA';
        $object->valeur = '5000';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Deux Mille FCFA';
        $object->valeur = '2000';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Mille FCFA';
        $object->valeur = '1000';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Cinq Cent FCFA';
        $object->valeur = '500';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Cent FCFA';
        $object->valeur = '100';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Cinquante FCFA';
        $object->valeur = '50';
        $object->save();

        $object = new Tlist_devise();
        $object->libelle = 'Vingt-Cinq FCFA';
        $object->valeur = '25';
        $object->save();
    }
}
