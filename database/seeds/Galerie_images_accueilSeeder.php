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

        /////////1//////////
$object = new Galerie_images_accueil();
$object->libelle = '1.png';
$object->info = 'MENKAM Francis ';
$object->position = '1';
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
$object->libelle = 'billetInvitationVIP.png';
$object->info = 'billetInvitationVIP';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////3//////////
$object = new Galerie_images_accueil();
$object->libelle = 'carteInvitationEnBoisVIP.png';
$object->info = 'carteInvitationEnBoisVIP';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////4//////////
$object = new Galerie_images_accueil();
$object->libelle = 'chemise SousMain.png';
$object->info = 'chemiseSousMain';
$object->position = '1000';
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
$object->libelle = 'comptoireAcrylic Guach.png';
$object->info = 'comptoireAcrylicGuach';
$object->position = '1000';
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
$object->libelle = 'comptoireAgenda.png';
$object->info = 'comptoireAgenda';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////7//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireAgrafes.png';
$object->info = 'comptoireAgrafes';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////8//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireAgrafeuses.png';
$object->info = 'comptoireAgrafeuses';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////9//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireBlockNote.png';
$object->info = 'comptoireBlockNote';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////10//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireBlockNoteVIP.png';
$object->info = 'comptoireBlockNoteVIP';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////11//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireBobinettes.png';
$object->info = 'comptoireBobinettes';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////12//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireBoitierCachets.png';
$object->info = 'comptoireBoitierCachets';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////13//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCalculatrices.png';
$object->info = 'comptoireCalculatrices';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////14//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCollePapiers.png';
$object->info = 'comptoireCollePapiers';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////15//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCouvertures Regles.png';
$object->info = 'comptoireCouverturesRegles';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////16//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCouvertures Regles2.png';
$object->info = 'comptoireCouverturesRegles2';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////17//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCraies.png';
$object->info = 'comptoireCraies';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////18//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCrayon TailleCrayons Marqueurs.png';
$object->info = 'comptoireCrayonTailleCrayonsMarqueurs';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////19//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireCrayonCouleur.png';
$object->info = 'comptoireCrayonCouleur';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////20//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireEncreDeskJet.png';
$object->info = 'comptoireEncreDeskJet';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////21//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireEncreLaserJet.png';
$object->info = 'comptoireEncreLaserJet';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////22//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireEnveloppe.png';
$object->info = 'comptoireEnveloppe';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////23//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireEnveloppe2.png';
$object->info = 'comptoireEnveloppe2';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////24//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireExterieur.png';
$object->info = 'comptoireExterieur';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////25//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireExterieur2.png';
$object->info = 'comptoireExterieur2';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////26//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireFormatA4.png';
$object->info = 'comptoireFormatA4';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////27//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireGomme tailleCrayon.png';
$object->info = 'comptoireGommetailleCrayon';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////28//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireInterieur.png';
$object->info = 'comptoireInterieur';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////29//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireManifolds.png';
$object->info = 'comptoireManifolds';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////30//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireMarqueurs couleurs feutres.png';
$object->info = 'comptoireMarqueurscouleursfeutres';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////31//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireMarqueursPermanant Surligneur.png';
$object->info = 'comptoireMarqueursPermanantSurligneur';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////32//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireMarqueursWhiteBoard.png';
$object->info = 'comptoireMarqueursWhiteBoard';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////33//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireMemo.png';
$object->info = 'comptoireMemo';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////34//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireOmduleur RegulateurTension.png';
$object->info = 'comptoireOmduleurRegulateurTension';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////35//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoirePerforateurs.png';
$object->info = 'comptoirePerforateurs';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////36//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireRecus Facturier.png';
$object->info = 'comptoireRecusFacturier';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////37//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireRegistre BlockNote.png';
$object->info = 'comptoireRegistreBlockNote';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////38//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireRegle TailleCrayons.png';
$object->info = 'comptoireRegleTailleCrayons';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////39//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireStylos.png';
$object->info = 'comptoireStylos';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////40//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireStylos2.png';
$object->info = 'comptoireStylos2';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////41//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireStylosRegles.png';
$object->info = 'comptoireStylosRegles';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////42//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireStylosVIP Scotch.png';
$object->info = 'comptoireStylosVIPScotch';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////43//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireStylosVIP.png';
$object->info = 'comptoireStylosVIP';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////44//////////
$object = new Galerie_images_accueil();
$object->libelle = 'comptoireTamponEncreur.png';
$object->info = 'comptoireTamponEncreur';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////45//////////
$object = new Galerie_images_accueil();
$object->libelle = 'ecranPlat.png';
$object->info = 'ecranPlat';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////46//////////
$object = new Galerie_images_accueil();
$object->libelle = 'livres Calculatrices.png';
$object->info = 'livresCalculatrices';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////47//////////
$object = new Galerie_images_accueil();
$object->libelle = 'photocopieuse.png';
$object->info = 'photocopieuse';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////48//////////
$object = new Galerie_images_accueil();
$object->libelle = 'plaque.png';
$object->info = 'plaque';
$object->position = '2';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////49//////////
$object = new Galerie_images_accueil();
$object->libelle = 'porteStylo.png';
$object->info = 'porteStylo';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////50//////////
$object = new Galerie_images_accueil();
$object->libelle = 'sacADosAldulte.png';
$object->info = 'sacADosAldulte';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////51//////////
$object = new Galerie_images_accueil();
$object->libelle = 'sacADosEnfants.png';
$object->info = 'sacADosEnfants';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////52//////////
$object = new Galerie_images_accueil();
$object->libelle = 'tableauBlanc.png';
$object->info = 'tableauBlanc';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////53//////////
$object = new Galerie_images_accueil();
$object->libelle = 'tableauBlanc2.png';
$object->info = 'tableauBlanc2';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////54//////////
$object = new Galerie_images_accueil();
$object->libelle = 'trophets.png';
$object->info = 'trophets';
$object->position = '1000';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////55//////////
$object = new Galerie_images_accueil();
$object->libelle = 'vueAerieneInterieur.png';
$object->info = 'vueAerieneInterieur';
$object->position = '6';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////56//////////
$object = new Galerie_images_accueil();
$object->libelle = 'vueAerieneInterieur2.png';
$object->info = 'vueAerieneInterieur2';
$object->position = '6';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////57//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VueLateraleInterieur.png';
$object->info = 'VueLateraleInterieur';
$object->position = '5';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////58//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VueLateraleInterieur2.png';
$object->info = 'VueLateraleInterieur2';
$object->position = '5';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////59//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VueLateraleInterieur3.png';
$object->info = 'VueLateraleInterieur3';
$object->position = '5';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////60//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VueLateraleInterieur4.png';
$object->info = 'VueLateraleInterieur4';
$object->position = '5';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////61//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VueLateraleInterieur5.png';
$object->info = 'VueLateraleInterieur5';
$object->position = '5';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////62//////////
$object = new Galerie_images_accueil();
$object->libelle = 'vuePrincipaleExterieur.png';
$object->info = 'vuePrincipaleExterieur';
$object->position = '3';
$idLastGalerie = $object->save();

$object = new Operation();
$object->type_operation = $typeOperation['id'];
$idLastOperation = $object->save();

$object = new Ope_user_gale();
$object->id_operation = $idLastOperation;
$object->id_user = $user['id'];
$object->id_galerie = $idLastGalerie;
$object->save();

/////////63//////////
$object = new Galerie_images_accueil();
$object->libelle = 'VuePrincipaleInterieur.png';
$object->info = 'VuePrincipaleInterieur';
$object->position = '4';
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
