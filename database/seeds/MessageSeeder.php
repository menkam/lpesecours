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
        $object->type_message = $type_message['id'];
        $object->id_user_send = $userSend['id'];
        $object->objet = 'Félécitation';
        $object->libelle = '<h1>Bonjour,</h1><hr><p> Félicitation votre compte a été créé avec succès</p><p>Nous vous remercions pour votre confiance et heureux de vous compter parmi nous</p><u>Cordialement<u>';
        $object->save();

        $admin = User::where('email', 'menkam35@gmail.com')->first();
        $personnel = User::where('email', 'personnel@gmail.com')->first();
        $visiteur = User::where('email', 'visiteur@gmail.com')->first();

        $object->users()->attach($admin);
        $object->users()->attach($personnel);
        $object->users()->attach($visiteur);
    }
}