<?php

use App\Models\Message;
use App\Models\Tlist_message;
use App\Models\User;

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('code', 'ADMIN')->first();
        $object = new Tlist_message();
        $object->code = 'TCH';
        $object->libelle = 'Tchat';
        $object->save();

    }
}
