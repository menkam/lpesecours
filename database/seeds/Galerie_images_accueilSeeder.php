<?php

use Illuminate\Database\Seeder;
use App\Models\Galerie_images_accueil;
use App\Models\Tlist_operation;
use App\Models\Operation;
use App\Models\User;
use App\Models\Ope_user_gale;

class Galerie_images_accueilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeOperation = Tlist_operation::where('code', 'CRE')->first();
        $user = User::where('email', 'lpesecours@gmail.com')->first();

        /////////0//////////

        $object = new Galerie_images_accueil();
        $object->libelle = '0.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        //////////1/////////

        $object = new Galerie_images_accueil();
        $object->libelle = '1.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        /////////2//////////

        $object = new Galerie_images_accueil();
        $object->libelle = '2.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        ////////3///////////

        $object = new Galerie_images_accueil();
        $object->libelle = '3.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        ///////4////////////

        $object = new Galerie_images_accueil();
        $object->libelle = '4.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        /////////5//////////

        $object = new Galerie_images_accueil();
        $object->libelle = '5.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();

        /////////6//////////

        $object = new Galerie_images_accueil();
        $object->libelle = '6.png';
        $idLastGalerie = $object->save();

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_gale();
        $object->id_operation = $idLastOperation;
        $object->id_user = $user['id'];
        $object->id_galerie = $idLastGalerie;
        $object->save();
    }
}
