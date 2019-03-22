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
        $typeOperation = Tlist_operation::where('code', 'CRE')->first();

        $groupeSystem = Tlist_groupe_user::where('code', 'SYSTE')->first();
        $acreditationSystem = Tlist_acreditation::where('numero', '123456')->first();

        $groupeVsiteur = Tlist_groupe_user::where('code', 'VSTER')->first();
        $acreditationVsiteur = Tlist_acreditation::where('numero', '3')->first();

        $object = new User();
        $object->groupe_user = $groupeSystem['id'];
        $object->acreditation = $acreditationSystem['id'];
        $object->name = 'ROOT';
        $object->surname = 'Admin';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->telephone = '+237670928110';
        $object->email = 'lpesecours@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = '1';
        $object->id_user2 = $idLastUser;
        $object->save();
///////////////////////////////////

        $user = User::where('email', 'lpesecours@gmail.com')->first();

        $object = new User();
        $object->groupe_user = $groupeVsiteur['id'];
        $object->acreditation = $acreditationVsiteur['id'];
        $object->name = 'VISITEUR';
        $object->surname = 'invite';
        $object->date_nais = '02/03/1992';
        $object->sexe = 'M';
        $object->telephone = '+237600000000';
        $object->email = 'visiteur@gmail.com';
        $object->password = bcrypt('12345678');
        $idLastUser = $object->save();

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
