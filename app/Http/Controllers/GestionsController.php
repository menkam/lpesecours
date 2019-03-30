<?php

namespace App\Http\Controllers;

//use App\Models\Gestions;
use Illuminate\Http\Request;


class GestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function recetteCachet(){ return view("gestions/RecettesCachet"); }
    
    public function depenseCachet(){ return view("gestions/DepensesCachet"); }
    
    public function bilanCachet(){ return view("gestions/BilanCachet"); }
    
    public function recettePhoto(){ return view("gestions/RecettePhoto"); }
    
    public function depensePhoto(){ return view("gestions/DepensePhoto"); }
    
    public function bilanPhoto(){ return view("gestions/BilanPhoto"); }
    
    public function recetteMoMo(){ return view("gestions/Recettes MoMo"); }
    
    public function bilanMoMo(){ return view("gestions/BilanMoMo"); }
    
    public function personnelle(){ return view("gestions/Personnelle");}
    

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