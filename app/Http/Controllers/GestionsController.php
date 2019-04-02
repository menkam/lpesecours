<?php

namespace App\Http\Controllers;

//use App\Models\Gestions;
use App\Models\Tlist_photo;
use Validator;
use App\Models\Mobile_money;
use App\Models\Photo;
use App\Models\Cachet;
use App\Models\Tlist_cachet;


use Illuminate\Http\Request;


class GestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function recetteCachet()
    {
        $optionTypeCachet = Tlist_cachet::getOption();
        return view("gestions/RecettesCachet", compact('optionTypeCachet'));
    }
    public function recettePhoto()
    {
        $optionTypePhoto = Tlist_photo::getOption();
        return view("gestions/RecettesPhoto", compact('optionTypePhoto'));
    }
    public function recetteMoMo()
    { return view("gestions/RecettesMoMo"); }
    
    public function depenseCachet(){ return view("gestions/DepensesCachet"); }
    public function depensePhoto(){ return view("gestions/DepensePhoto"); }
    
    public function bilanPhoto(){ return view("gestions/BilanPhoto"); }
    public function bilanCachet(){ return view("gestions/BilanCachet"); }
    public function bilanMoMo()
    {
        $resulMoMo = Mobile_money::showBilan();
        //dd($resulMoMo);
        $rowBilanMoMo = $resulMoMo[0];
        $somPret = $resulMoMo[1];
        $somFrais = $resulMoMo[2];
        $maxComm = $resulMoMo[3];
        $somMEC2 = $resulMoMo[4];
        $maxSup = $resulMoMo[5];
        $lastFond = $resulMoMo[6];

        return view("gestions/BilanMoMo", compact('rowBilanMoMo','somPret','somFrais','maxComm','somMEC2','maxSup','lastFond'));
    }
    
    public function personnelle(){ return view("gestions/Personnelle");}

    public function saveRecetteMoMo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'fond' => 'required|integer',
            'pret' => 'required|integer',
            'espece' => 'required|integer',
            'compte_momo' => 'required|integer',
            'compte2' => 'required|integer',
            'frais_transfert' => 'required|integer',
            'commission' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Mobile_money::create([
                'date' => $request['date'],
                'fond' => $request['fond'],
                'pret' => $request['pret'],
                'espece' => $request['espece'],
                'compte_momo' => $request['compte_momo'],
                'compte2' => $request['compte2'],
                'frais_transfert' => $request['frais_transfert'],
                'commission' => $request['commission'],
            ]);
            if($save)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function saveRecettePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Photo::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire'],
            ]);
            if($save)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function saveRecetteCachet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Cachet::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire'],
            ]);
            if($save)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function getOptionTypeCachet(Request $request)
    {
        $optionTypeCachet = Tlist_cachet::getOption();
        return response()->json($optionTypeCachet);
    }
    public function getOptionTypePhoto(Request $request)
    {
        $optionTypePhoto = Tlist_photo::getOption();
        return response()->json($optionTypePhoto);
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
     * @param  \App\Models\Gestions  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Gestions $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gestions  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Gestions $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestions  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gestions $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestions  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestions $objet)
    {
        //
    }
    
}