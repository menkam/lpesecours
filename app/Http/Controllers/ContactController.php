<?php

namespace App\Http\Controllers;

//use App\Models\Contacts;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){ return view("Contacts"); }
    

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
     * @param  \App\Models\Contacts  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $objet)
    {
        //
    }
    
}