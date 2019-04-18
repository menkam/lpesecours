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
        $userSend = User::where('email', 'lpesecours@gmail.com')->first();
        $userRecive = User::where('email', 'menkam35@gmail.com')->first();
        $type_message = Tlist_message::where('code', 'SYS')->first();

        $object = new Message();
        $object->id = '1';
        $object->type_message = $type_message['id'];
        $object->id_user_send = $userSend['id'];
        $object->objet = 'Félécitation';
        $object->libelle = '<h1>Bonjour,</h1><hr><p> Félicitation votre compte a été créé avec success</p><br>Nous vous remercions pour votre confiance et heureux de vous compter parmis nous';
        $object->save();
    }
}