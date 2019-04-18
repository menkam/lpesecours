<?php

use App\Models\User;
use App\Models\Tlist_operation;
use App\Models\Operation;
use App\Models\Ope_user_me;

use Illuminate\Database\Seeder;

class Oper_user_mesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $typeOperation = Tlist_operation::where('code', 'CRE')->first();
        $admin = User::where('email', 'menkam35@gmail.com')->first();
        $personnel = User::where('email', 'personnel@gmail.com')->first();
        $visiteur = User::where('email', 'visiteur@gmail.com')->first();
        $msg = 1;

        //////////////////send  msg to new admin/////////////

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_me();
        $object->id_operation = $idLastOperation;
        $object->id_user_recive = $admin['id'];
        $object->id_message = $msg;
        $object->save();

        //////////////////send  msg to new personnel/////////////

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_me();
        $object->id_operation = $idLastOperation;
        $object->id_user_recive = $personnel['id'];
        $object->id_message = $msg;
        $object->save();

        //////////////////send  msg to new visiteur/////////////

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_me();
        $object->id_operation = $idLastOperation;
        $object->id_user_recive = $visiteur['id'];
        $object->id_message = $msg;
        $object->save();


    }
}
