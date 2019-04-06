<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_acreditation;
use App\Models\Tlist_operation;
use App\Models\Operation;
use App\Models\Ope_user_user;

class UserSeeder extends Seeder
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


        $typeOperation = Tlist_operation::where('code', 'CRE')->first();

        ///////admin/////////////////
        $object = new User();
        $object->name = 'ROOT';
        $object->surname = 'Admin';
        $object->date_nais = '02/03/1992';
        $object->photo = 'admin.jpg';
        $object->sexe = 'M';
        $object->telephone = '+237670928110';
        $object->email = 'lpesecours@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();
        $object->groupe_users()->attach($groupe_admin);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->acreditations()->attach($acc_modi);
        $object->acreditations()->attach($acc_desa);
        $object->acreditations()->attach($acc_acti);
        $object->acreditations()->attach($acc_supp);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = '1';
        $object->id_user2 = $idLastUser;
        $object->save();


///////////////personnel////////////////////

        $user = User::where('email', 'lpesecours@gmail.com')->first();

        $object = new User();
        $object->name = 'PERSONNEL';
        $object->surname = 'Personnel';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'personnel.png';
        $object->telephone = '+237600000000';
        $object->email = 'personnel@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();
        $object->groupe_users()->attach($groupe_personnel);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->acreditations()->attach($acc_modi);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_user2 = $idLastUser;
        $object->save();

///////////////membre////////////////////

        $user = User::where('email', 'lpesecours@gmail.com')->first();

        $object = new User();
        $object->name = 'MEMBRE';
        $object->surname = 'Membre';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'membre.png';
        $object->telephone = '+237600000001';
        $object->email = 'membre@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();
        $object->groupe_users()->attach($groupe_membre);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_user2 = $idLastUser;
        $object->save();

///////////////visiteur////////////////////

        $user = User::where('email', 'lpesecours@gmail.com')->first();

        $object = new User();
        $object->name = 'VISITEUR';
        $object->surname = 'invite';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'visiteur.png';
        $object->telephone = '+237600000002';
        $object->email = 'visiteur@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();
        $object->groupe_users()->attach($groupe_visiter);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_user2 = $idLastUser;
        $object->save();


///////////////bloquer////////////////////

        $user = User::where('email', 'lpesecours@gmail.com')->first();

        $object = new User();
        $object->name = 'BLOQUER';
        $object->surname = 'Bloquer';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->photo = 'bloquer.png';
        $object->telephone = '+237600000003';
        $object->email = 'bloquer@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();
        $object->groupe_users()->attach($groupe_bloquer);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_user2 = $idLastUser;
        $object->save();
    }
}
