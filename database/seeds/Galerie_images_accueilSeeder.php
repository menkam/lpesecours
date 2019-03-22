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
        $object->libelle = '1.jpg';
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
        $object->libelle = 'billetInvitationVIP.jpg';
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
        $object->libelle = 'carteInvitationEnBoisVIP.jpg';
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
        $object->libelle = 'chemise&SousMain.jpg';
        $object->info = 'chemise  & SousMain';
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
        $object->libelle = 'comptoireAcrylic&Guach.jpg';
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
        $object->libelle = 'comptoireAgenda.jpg';
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
        $object->libelle = 'comptoireAgrafes.jpg';
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
        $object->libelle = 'comptoireAgrafeuses.jpg';
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
        $object->libelle = 'comptoireBlockNote.jpg';
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
        $object->libelle = 'comptoireBlockNoteVIP.jpg';
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
        $object->libelle = 'comptoireBobinettes.jpg';
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
        $object->libelle = 'comptoireBoitierCachets.jpg';
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
        $object->libelle = 'comptoireCalculatrices.jpg';
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
        $object->libelle = 'comptoireCollePapiers.jpg';
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
        $object->libelle = 'comptoireCouvertures&Regles.jpg';
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
        $object->libelle = 'comptoireCouvertures&Regles2.jpg';
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
        $object->libelle = 'comptoireCraies.jpg';
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
        $object->libelle = 'comptoireCrayon&TailleCrayons&Marqueurs.jpg';
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
        $object->libelle = 'comptoireCrayonCouleur.jpg';
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
        $object->libelle = 'comptoireEncreDeskJet.jpg';
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
        $object->libelle = 'comptoireEncreLaserJet.jpg';
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
        $object->libelle = 'comptoireEnveloppe.jpg';
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
        $object->libelle = 'comptoireEnveloppe2.jpg';
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
        $object->libelle = 'comptoireExterieur.jpg';
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
        $object->libelle = 'comptoireExterieur2.jpg';
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
        $object->libelle = 'comptoireFormatA4.jpg';
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
        $object->libelle = 'comptoireGomme&tailleCrayon.jpg';
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
        $object->libelle = 'comptoireInterieur.jpg';
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
        $object->libelle = 'comptoireManifolds.jpg';
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
        $object->libelle = 'comptoireMarqueurs&couleurs&feutres.jpg';
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
        $object->libelle = 'comptoireMarqueursPermanant&Surligneur.jpg';
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
        $object->libelle = 'comptoireMarqueursWhiteBoard.jpg';
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
        $object->libelle = 'comptoireMemo.jpg';
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
        $object->libelle = 'comptoireOmduleur&RegulateurTension.jpg';
        $object->info = 'comptoire Omduleur Regulateur de Tension';
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
        $object->libelle = 'comptoirePerforateurs.jpg';
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
        $object->libelle = 'comptoireRecus&Facturier.jpg';
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
        $object->libelle = 'comptoireRegistre&BlockNote.jpg';
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
        $object->libelle = 'comptoireRegle&TailleCrayons.jpg';
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
        $object->libelle = 'comptoireStylos.jpg';
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
        $object->libelle = 'comptoireStylos2.jpg';
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
        $object->libelle = 'comptoireStylosRegles.jpg';
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
        $object->libelle = 'comptoireStylosVIP&Scotch.jpg';
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
        $object->libelle = 'comptoireStylosVIP.jpg';
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
        $object->libelle = 'comptoireTamponEncreur.jpg';
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
        $object->libelle = 'ecranPlat.jpg';
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
        $object->libelle = 'livres&Calculatrices.jpg';
        $object->info = 'livres et Calculatrices';
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
        $object->libelle = 'photocopieuse.jpg';
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
        $object->libelle = 'plaque.jpg';
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
        $object->libelle = 'porteStylo.jpg';
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
        $object->libelle = 'sacADosAldulte.jpg';
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
        $object->libelle = 'sacADosEnfants.jpg';
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
        $object->libelle = 'tableauBlanc.jpg';
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
        $object->libelle = 'tableauBlanc2.jpg';
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
        $object->libelle = 'trophets.jpg';
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
        $object->libelle = 'vueAerieneInterieur.jpg';
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
        $object->libelle = 'vueAerieneInterieur2.jpg';
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
        $object->libelle = 'VueLateraleInterieur.jpg';
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
        $object->libelle = 'VueLateraleInterieur2.jpg';
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
        $object->libelle = 'VueLateraleInterieur3.jpg';
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
        $object->libelle = 'VueLateraleInterieur4.jpg';
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
        $object->libelle = 'VueLateraleInterieur5.jpg';
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
        $object->libelle = 'vuePrincipaleExterieur.jpg';
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
        $object->libelle = 'VuePrincipaleInterieur.jpg';
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
