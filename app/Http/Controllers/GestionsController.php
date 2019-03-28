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
    
    public function recetteCachet(){ return view("RecettesCachet"); }
    
    public function depenseCachet(){ return view("DepensesCachet"); }
    
    public function bilanCachet(){ return view("BilanCachet"); }
    
    public function recettePhoto(){ return view("RecettePhoto"); }
    
    public function depensePhoto(){ return view("DepensePhoto"); }
    
    public function bilanPhoto(){ return view("BilanPhoto"); }
    
    public function recetteMoMo(){ return view("Recettes MoMo"); }
    
    public function bilanMoMo(){ return view("BilanMoMo"); }
    
    public function personnelle(){ return view("Personnelle");}
    

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