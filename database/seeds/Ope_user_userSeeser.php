<?php

use Illuminate\Database\Seeder;
use App\Models\Ope_user_user;
use App\Models\User;

class Ope_user_userSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::where('email', 'lpesecours@gmail.com')->first();
        $user2 = User::where('email', 'visiteur@gmail.com')->first();

        $object = new Ope_user_user();
        $object->id_operation = '1';
        $object->id_user = $user1['id'];
        $object->id_user2 = $user1['id'];
        $object->save();

        $object = new Ope_user_user();
        $object->id_operation = '2';
        $object->id_user = $user1['id'];
        $object->id_user2 = $user2['id'];
        $object->save();
    }
}
