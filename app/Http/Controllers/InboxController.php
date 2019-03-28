<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;


class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){ return view("Messagerie"); }
    

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
     * @param  \App\Models\Messagerie  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show(Messagerie $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messagerie  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit(Messagerie $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messagerie  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messagerie $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messagerie  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messagerie $objet)
    {
        //
    }
    
}