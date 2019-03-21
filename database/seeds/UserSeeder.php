<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = new User();
        $object->groupe_user = '1';
        $object->acreditation = '11';
        $object->name = 'MENKAM';
        $object->surname = 'Francis';
        $object->date_nais = '02-03-1992';
        $object->sexe = 'M';
        $object->telephone = '+237670256150';
        $object->email = 'menkam35@gmail.com';
        $object->password = bcrypt('12345678');
        $object->save();
    }
}
