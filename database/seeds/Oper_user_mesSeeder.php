<?php

use App\Models\User;
use App\Models\Message_user_;

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
        $admin = User::where('email', 'menkam35@gmail.com')->first();
        $personnel = User::where('email', 'personnel@gmail.com')->first();
        $visiteur = User::where('email', 'visiteur@gmail.com')->first();
        $idFirstmsg = 1;

        //////////////////send  msg to new admin/////////////
        $object = new Message_user_();
        $object->id_user_recive = $admin['id'];
        $object->id_message = $idFirstmsg;
        $object->save();

        //////////////////send  msg to new personnel/////////////
        $object = new Message_user_();
        $object->id_user_recive = $personnel['id'];
        $object->id_message = $idFirstmsg;
        $object->save();

        //////////////////send  msg to new visiteur/////////////
        $object = new Message_user_();
        $object->id_user_recive = $visiteur['id'];
        $object->id_message = $idFirstmsg;
        $object->save();
    }
}
