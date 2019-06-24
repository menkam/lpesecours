<?php

namespace App\Http\Controllers;

use App\Models\Monnaie;
use App\Fonctions;
use Illuminate\Http\Request;

class MonnaieController extends Controller
{
    public function getSommeMonnaie(Request $request)
    {
        //$idUser = \Auth::user()->id;
        $date = $request->date;
        if($date)
        {
            $somme = Monnaie::getSomme($date);
            if(!empty($somme[0])) return response()->json(['somme'=>Fonctions::formatPrix($somme[0]),'detail'=>$somme[1]]);
            else return response()->json(['vide'=>'pas d\'enregistrement pour le'.$date]);
        }
        else  return response()->json(['error'=>'Bien vouloir choisir une date valide !!!']);
    }
}
