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
        $groupeSystem = Tlist_groupe_user::where('code', 'SYSTE')->first();
        $acreditationSystem = Tlist_acreditation::where('numero', '123456')->first();

        $groupeVsiteur = Tlist_groupe_user::where('code', 'VSTER')->first();
        $acreditationVsiteur = Tlist_acreditation::where('numero', '3')->first();

        $object = new User();
        $object->groupe_user = $groupeSystem['id'];
        $object->acreditation = $acreditationSystem['id'];
        $object->name = 'ROOT2';
        $object->surname = 'Admin';
        $object->date_nais = '21/03/2019';
        $object->sexe = 'M';
        $object->telephone = '+237670928110';
        $object->email = 'lpesecours@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();

        $object = new User();
        $object->groupe_user = $groupeVsiteur['id'];
        $object->acreditation = $acreditationVsiteur['id'];
        $object->name = 'VISITEUR';
        $object->surname = 'invite';
        $object->date_nais = '21/03/2019';
        $object->sexe = 'M';
        $object->telephone = '+237600000000';
        $object->email = 'visiteur@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
    }
}
