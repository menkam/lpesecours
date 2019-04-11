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
        if ($request['typeModal']=="momo")        $page = Mobile_money::getRecetteMomo($request['id']);
        elseif ($request['typeModal']=="photo")   $page = Photo::getRecettePhoto($request['id']);
        elseif ($request['typeModal']=="cachet")  $page = Cachet::getRecetteCachet($request['id']);
        return $page;
        //return response()->json($page);
    }

    public function loadContentModalDelete(Request $request)
    {
        //
    }
}
