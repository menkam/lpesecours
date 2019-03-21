<?php

use Illuminate\Database\Seeder;
use App\Models\Operation;
use App\Models\Tlist_operation;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeOperation = Tlist_operation::where('code', 'CRE')->first();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $object->save();
    }
}
