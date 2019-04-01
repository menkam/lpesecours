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
        $object->date = 'SYSTE';
        $object->type = 'SYSTE';
        $object->nombre = 'Systeme';
        $object->prix_unitaire = 'Systeme';
        $object->save();
    }
}
