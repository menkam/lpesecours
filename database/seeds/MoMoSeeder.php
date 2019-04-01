<?php

use Illuminate\Database\Seeder;
use App\Models\Mobile_money;

class MoMoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $object = new Mobile_money();
        $object->date = 'SYSTE';
        $object->fond = 'SYSTE';
        $object->pret = 'Systeme';
        $object->espece = 'Systeme';
        $object->compte_momo = 'Systeme';
        $object->compte2 = 'Systeme';
        $object->frais_transfert = 'Systeme';
        $object->commission = 'Systeme';
        $object->save();
    }
}
