<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_acreditation;
use App\Models\Message;
use App\Models\Message_user;

class User2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupe_admin = Tlist_groupe_user::where('code', 'ADMIN')->first();
        $groupe_personnel = Tlist_groupe_user::where('code', 'PERSO')->first();
        $groupe_membre = Tlist_groupe_user::where('code', 'MEBRE')->first();
        $groupe_visiter = Tlist_groupe_user::where('code', 'VSTER')->first();
        $groupe_bloquer = Tlist_groupe_user::where('code', 'BLOQU')->first();

        $acc_lect = Tlist_acreditation::where('libelle', 'Lecture')->first();
        $acc_ecri = Tlist_acreditation::where('libelle', 'Ecriture')->first();
        $acc_modi = Tlist_acreditation::where('libelle', 'Modification')->first();
        $acc_desa = Tlist_acreditation::where('libelle', 'Desactivation')->first();
        $acc_acti = Tlist_acreditation::where('libelle', 'Activition')->first();
        $acc_supp = Tlist_acreditation::where('libelle', 'Suppression')->first();

        $msg = Message::where('id', '1')->first();


        ///////admin/////////////////
        $object = new User();
        $object->name = 'MENKAM';
        $object->surname = 'Francis';
        $object->date_nais = '02/03/1995';
        $object->photo = 'francis.jpg';
        $object->sexe = 'M';
        $object->telephone = '+237670256150';
        $object->email = 'menkam35@gmail.com';
        $object->password = bcrypt('MENKAMfrancis');
        $object->save();

        $object->groupe_users()->attach($groupe_admin);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->acreditations()->attach($acc_modi);
        $object->acreditations()->attach($acc_desa);
        $object->acreditations()->attach($acc_acti);
        $object->acreditations()->attach($acc_supp);
        $object->messages()->attach($msg);
        $idUser = $object->id;
        $sol = Message_user::updateMesUser($idUser,$msg['id']);

///////////////personnel////////////////////

        $object = new User();
        $object->name = 'PERSONNEL';
        $object->surname = 'Personnel';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'personnel.png';
        $object->telephone = '+237600000000';
        $object->email = 'personnel@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
        $object->groupe_users()->attach($groupe_personnel);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->acreditations()->attach($acc_modi);
        $object->messages()->attach($msg);
        $idUser = $object->id;
        $sol = Message_user::updateMesUser($idUser,$msg['id']);

///////////////membre////////////////////
        $object = new User();
        $object->name = 'MEMBRE';
        $object->surname = 'Membre';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'membre.png';
        $object->telephone = '+237600000001';
        $object->email = 'membre@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
        $object->groupe_users()->attach($groupe_membre);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->messages()->attach($msg);
        $idUser = $object->id;
        $sol = Message_user::updateMesUser($idUser,$msg['id']);

///////////////visiteur////////////////////
        $object = new User();
        $object->name = 'VISITEUR';
        $object->surname = 'invite';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'visiteur.png';
        $object->telephone = '+237600000002';
        $object->email = 'visiteur@gmail.com';
        //$object->password = bcrypt('12345678');
        $object->password = '$2y$10$bfET0B3jPb8hU/ZN9UWUiu0P1uRCtmlpPbZV/jN109Jw.gq2Jbazi';
        $object->save();
        $object->groupe_users()->attach($groupe_visiter);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->messages()->attach($msg);
        $idUser = $object->id;
        $sol = Message_user::updateMesUser($idUser,$msg['id']);

///////////////bloquer////////////////////
        $object = new User();
        $object->name = 'BLOQUER';
        $object->surname = 'Bloquer';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'bloquer.png';
        $object->telephone = '+237600000003';
        $object->email = 'bloquer@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
        $object->groupe_users()->attach($groupe_bloquer);

    }
}
