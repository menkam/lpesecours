<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_acreditation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $groupe_system = Tlist_groupe_user::where('code', 'SYSTE')->first();

        $acc_lect = Tlist_acreditation::where('libelle', 'Lecture')->first();
        $acc_ecri = Tlist_acreditation::where('libelle', 'Ecriture')->first();
        $acc_modi = Tlist_acreditation::where('libelle', 'Modification')->first();
        $acc_desa = Tlist_acreditation::where('libelle', 'Desactivation')->first();
        $acc_acti = Tlist_acreditation::where('libelle', 'Activition')->first();
        $acc_supp = Tlist_acreditation::where('libelle', 'Suppression')->first();


        /*$typeOperation = Tlist_operation::where('code', 'CRE')->first();*/

        ///////System/////////////////
        $object = new User();
        $object->name = 'ROOT';
        $object->surname = 'Admin';
        $object->date_nais = '02/03/1992';
        $object->photo = 'admin.jpg';
        $object->sexe = 'M';
        $object->telephone = '+237670928110';
        $object->email = 'lpesecours@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
        $object->groupe_users()->attach($groupe_system);
        $object->acreditations()->attach($acc_lect);
        $object->acreditations()->attach($acc_ecri);
        $object->acreditations()->attach($acc_modi);
        $object->acreditations()->attach($acc_desa);
        $object->acreditations()->attach($acc_acti);
        $object->acreditations()->attach($acc_supp);

        //////////////////////////////////////

    }
}
