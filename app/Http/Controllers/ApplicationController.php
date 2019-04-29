<?php

namespace App\Http\Controllers;

use App\Fonctions;
use App\Models\Menu;
use App\Models\User;
use App\Models\Message;
use App\Models\Message_user;
use App\Models\Mobile_money;
use App\Models\Cachet;
use App\Models\Photo;
use App\FichiersCSV;
use App\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FichePictures;   //Permet de mettre en place la validateur personnalisé
use Validator;
use Illuminate\Support\Facades\Redirect;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function Maintenance(){ return view("applications/Maintenance");}
    public function menus()
    {
        $menu = new Menu(\Auth::user()->getGroupe_user());
        $bodyListMenus = $menu->ListMenus();
        return view("applications/Menus", compact('bodyListMenus'));
    }

    public function downloadDataBase()
    {
        $result = 'Sauvegarde de l\'application en cours...<br>';
        $result = $result.User::saveUser();
        $result = $result.Message::saveMessage();
        $result = $result.Message_user::saveMessage_user();
        $result = $result.Cachet::saveCachet();
        $result = $result.Photo::savePhoto();
        $result = $result.Mobile_money::saveMomo();

        return view("applications/downloadDataBase", compact('result'));
    }

    public function uploadDataBase()
    {
        $result = 'Restauration de l`application en cours...<br>';
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $fichierCSV = $_FILES["fichierCSV"];
            $allowed = array("csv" => "application/vnd.ms-excel");
            $filename = $fichierCSV["name"];
            $chemin = Fonctions::cheminUpdateCSV($filename);

            $result = UploadFile::run($fichierCSV,$allowed,$filename,$chemin);

            $nomFichiers = explode("_", $filename);
            $nomFichier = $nomFichiers[1];
            if($nomFichier=="momo.csv") $result = $result.Mobile_money::createGlobalMomo(FichiersCSV::lecture($filename));
            elseif($nomFichier=="photo.csv") $result = $result.Photo::createGlobalPhoto(FichiersCSV::lecture($filename));
            elseif($nomFichier=="cachet.csv") $result = $result.Cachet::createGlobalCachet(FichiersCSV::lecture($filename));
            elseif($nomFichier=="user.csv") $result = $result.User::createGlobalUser(FichiersCSV::lecture($filename));
            elseif($nomFichier=="message.csv") $result = $result.Message::createGlobalMessage(FichiersCSV::lecture($filename));
            //elseif($nomFichier=="message_user.csv") $result = $result.Message_user::cre(FichiersCSV::lecture($filename));

        }
        return view("applications/uploadDataBase", compact('result'));
    }
    public function uploadFichierCSV(Request $request)
    {
        $result = 'Upload en cours...<br>';
        //dd();

        // Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $photo = $_FILES["photo"];
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = Fonctions::getCurentDateChaine("test");
            $chemin = Fonctions::cheminAvatar($filename);
            $maxsize = 10*1024;

            //$result = UploadFile::run($photo,$allowed,$filename,$chemin,$maxsize);
            $result = User::saveAvatar($photo,$filename);
        }
        return view("applications/Maintenance", compact('result'));
    }

    public function listMenu(Request $request){
        $menu = new Menu(\Auth::user()->getGroupe_user());
        $menus = $menu->getAllMenu();
        return ($menus);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Application $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $objet)
    {
        //
    }
    
}