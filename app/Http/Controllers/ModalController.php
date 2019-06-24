<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Cachet;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use App\Models\Mobile_money;
use App\Models\Photo;
use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Monnaie;
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
    public function loadContentModalAdd(Request $request)
    {
        $page = 'Contenu vide';
        if ($request['typeModal']=="monnaie") $page = Monnaie::getContentAdd();
        return $page;
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
        elseif ($request['typeModal']=="detailEspeceMomo")  $page = Monnaie::getContentUpdate($request['date']);
        return $page;
        //return response()->json($page);
    }
    public function loadContentModalDelete(Request $request)
    {
        //
    }


    public function saveModalAdd(Request $request)
    {
        $page = ['error'=>"error 99"];
        if ($request['typeModal']=="saveMonnaie") $page = Monnaie::createMonnaie($request);
        return $page;
        //return response()->json($page);
    }
    public function saveModalUpdate(Request $request)
    {
        $page = ['error'=>"error 99"];
        if ($request['typeModal']=="menu") $page = $this->updateMenu($request);
        elseif ($request['typeModal']=="groupeuser") $page = $this->updateGroupeUser($request);
        elseif ($request['typeModal']=="user") $page = $this->updateUser($request);
        elseif ($request['typeModal']=="momo") $page = Mobile_money::updateMomo($request);
        elseif ($request['typeModal']=="photo")  $page = $this->updateRecettePhoto($request);
        elseif ($request['typeModal']=="cachet")  $page = $this->updateRecetteCachet($request);
        elseif ($request['typeModal']=="updateMonnaie")  $page = Monnaie::updateValeur($request);
        return $page;
        //return response()->json($page);
    }

    public function updateMenu($request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'idparent' => 'integer',
            'idfils' => 'required|integer',
            'libelle' => 'required|string',
            'icon' => 'required|string',
            'groupeuser' => 'required|integer',
            'rang' => 'required|integer',
            'valide' => 'required|integer',
            'statut' => 'required|integer',
        ]);
        if ($validator->passes()) {
            $update = Menu::updateMenu([
                'id' => $request['id'],
                'idparent' => $request['idparent'],
                'idfils' => $request['idfils'],
                'libelle' => $request['libelle'],
                'lien' => $request['lien'],
                'icon' => $request['icon'],
                'route' => $request['route'],
                'controller' => $request['controller'],
                'fichiercontroller' => $request['fichiercontroller'],
                'fichierview' => $request['fichierview'],
                'groupeuser' => $request['groupeuser'],
                'rang' => $request['rang'],
                'valide' => $request['valide'],
                'statut' => $request['statut']
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function updateGroupeUser($request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'code' => 'required|string|Max:5|Min:5',
            'libelle' => 'required|string',
            'statut' => 'required|integer'
        ]);
        if ($validator->passes()) {
            $update = Tlist_groupe_user::updateGroupeUser([
                'id' => $request['id'],
                'code' => $request['code'],
                'libelle' => $request['libelle'],
                'statut' => $request['statut']
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function updateUser($request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'tlist_groupe_user_id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'photo' => 'required|string',
            'date_nais' => 'required|date',
            'sexe' => 'required|string|Max:1|Min:1',
            'telephone' => 'required|string|Max:13|Min:9',
            'email' => 'required|string|email',
            'statut' => 'required|integer',
        ]);
        if ($validator->passes()) {
            $update = User::updateUser([
                'id' => $request['id'],
                'tlist_groupe_user_id' => $request['tlist_groupe_user_id'],
                'name' => $request['name'],
                'surname' => $request['surname'],
                'photo' => $request['photo'],
                'date_nais' => $request['date_nais'],
                'sexe' => $request['sexe'],
                'telephone' => $request['telephone'],
                'email' => $request['email'],
                'statut' => $request['statut']
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function updateRecettePhoto($request)
{
    $validator = Validator::make($request->all(), [
        'id' => 'required|integer',
        'date' => 'required|date',
        'type' => 'required|integer',
        'nombre' => 'required|integer',
        'prix_unitaire' => 'required|integer',
    ]);
    if ($validator->passes()) {
        $update = Photo::updatePhoto([
            'id' => $request['id'],
            'date' => $request['date'],
            'type' => $request['type'],
            'nombre' => $request['nombre'],
            'prix_unitaire' => $request['prix_unitaire']
        ]);
        if($update)
            return response()->json(['success'=>'Modification réussite.']);
        return response()->json(['error'=>'error']);
    }
    return response()->json(['error'=>$validator->errors()->all()]);
}
    public function updateRecetteCachet($request)
{
    $validator = Validator::make($request->all(), [
        'id' => 'required|integer',
        'date' => 'required|date',
        'type' => 'required|integer',
        'nombre' => 'required|integer',
        'prix_unitaire' => 'required|integer',
    ]);
    if ($validator->passes()) {
        $update = Cachet::updateCachet([
            'id' => $request['id'],
            'date' => $request['date'],
            'type' => $request['type'],
            'nombre' => $request['nombre'],
            'prix_unitaire' => $request['prix_unitaire']
        ]);
        if($update)
            return response()->json(['success'=>'Modification réussite.']);
        return response()->json(['error'=>'error']);
    }
    return response()->json(['error'=>$validator->errors()->all()]);
}
}
