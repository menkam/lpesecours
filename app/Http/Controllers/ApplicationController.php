<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Message;
use App\Models\Message_user;
use App\Models\Mobile_money;
use App\Models\Cachet;
use App\Models\Photo;
use App\FichiersCSV;
use Illuminate\Http\Request;


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
        //$result = $result.User::createGlobalUser(FichiersCSV::lecture("user"));
        //$result = $result.Message::createGlobalMessage(FichiersCSV::lecture("message"));
        $result = $result.Cachet::createGlobalCachet(FichiersCSV::lecture("cachet"));
        $result = $result.Photo::createGlobalPhoto(FichiersCSV::lecture("photo"));
        $result = $result.Mobile_money::createGlobalMomo(FichiersCSV::lecture("momo"));
        return view("applications/uploadDataBase", compact('result'));
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