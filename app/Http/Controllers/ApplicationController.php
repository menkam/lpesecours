<?php

namespace App\Http\Controllers;

//use App\Models\Application;
use Illuminate\Http\Request;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function Maintenance(){ return view("applications/Maintenance");}
    

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
     * @param  \App\Models\Application  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Application $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $objet)
    {
        //
    }
    
}