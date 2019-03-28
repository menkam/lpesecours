<?php

namespace App\Http\Controllers;

//use App\Models\Parametre;
use Illuminate\Http\Request;


class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function profile(){ return view("Profile");}
    

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
     * @param  \App\Models\Parametre  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Parametre $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parametre  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametre $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametre  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametre $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parametre  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametre $objet)
    {
        //
    }
    
}