<?php

namespace App\Http\Controllers;

use App\Models\Galeries;
use Illuminate\Http\Request;


class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){ return view("Galeries"); }
    

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
     * @param  \App\Models\Galeries  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Galeries $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeries  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeries $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeries  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeries $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeries  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeries $objet)
    {
        //
    }
    
}