<?php

namespace App\Http\Controllers;


use App\Models\Cachet;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use App\Models\Mobile_money;
use App\Models\Photo;
use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_message;
use App\Models\Tlist_cachet;
use App\Models\Tlist_photo;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModalController extends Controller
{

    public function store(Request $request)
    {
        //
    }


    public function loadContentModalView(Request $request)
    {
        //
    }

    public function loadContentModalUpdate(Request $request)
    {
        $page = 'Contenu vide';
        if ($request['typeModal']=="menu")        $page = Menu::getContentUpdate($request['id']);
        if ($request['typeModal']=="groupeuser")        $page = Tlist_groupe_user::getContentUpdate($request['id']);
        if ($request['typeModal']=="user")        $page = User::getContentUpdate($request['id']);
        if ($request['typeModal']=="momo")        $page = Mobile_money::getContentUpdate($request['id']);
        elseif ($request['typeModal']=="photo")   $page = Photo::getContentUpdate($request['id']);
        elseif ($request['typeModal']=="cachet")  $page = Cachet::getContentUpdate($request['id']);
        return $page;
        //return response()->json($page);
    }

    public function loadContentModalDelete(Request $request)
    {
        //
    }
}
