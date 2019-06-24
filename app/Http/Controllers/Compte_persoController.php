<?php

namespace App\Http\Controllers;

use App\Models\Compte_perso;
use Illuminate\Http\Request;

class Compte_persoController extends Controller
{
    public function saveComptePerso(Request $request)
    {
        return Compte_perso::createCompte_perso($request);
        //return response()->json(['success'=>'Added Date:  -> success.']);
    }
    public function updateComptePerso(Request $request)
    {
        return Compte_perso::updateCompte_perso($request);
        //return response()->json(['success'=>'Added Date:  -> success.']);
    }
    public function existRecordComptePerso(Request $request)
    {
        $result = response()->json(['error'=>'Error']);
        $date = $request->date;
        $type = $request->type;
        $compte = Compte_perso::isExcist($date,$type);

        if($compte)
        {
            $row = Compte_perso::getRow($date,$type);
            $somme = $row->somme;
            $commentaire = $row->commentaire;
            $result = response()->json(['success'=>'1','somme'=>$somme,'commentaire'=>$commentaire]);
        }
        else $result = response()->json(['success'=>'0']);

        return $result;
    }
}
