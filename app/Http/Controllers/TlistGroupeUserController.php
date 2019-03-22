<?php

namespace App\Http\Controllers;

use App\Models\Tlist_groupe_user;
use Illuminate\Http\Request;
use DB;

class TlistGroupeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function getOptionGroupeUser(Request $request)
    {
        //$id = $request->id;
        /*return DB::select("
            SELECT 
              tlist_groupe_users.id, 
              tlist_groupe_users.code, 
              tlist_groupe_users.libelle
            FROM 
              public.tlist_groupe_users
            WHERE 
              tlist_groupe_users.statut = '1';
      ");*/
        return 1;
    }
    public function getOptionGroupeUser0(Request $request)
    {
        $id = $request->id;
        $condition = "";

        if(!empty($id)){
            $condition = "tlist_groupe_users.id = $id";
        }
        return DB::select("
            SELECT 
              tlist_groupe_users.id, 
              tlist_groupe_users.code, 
              tlist_groupe_users.libelle
            FROM 
              public.tlist_groupe_users
            WHERE 
              $condition AND 
              tlist_groupe_users.statut = '1';
        ");
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
     * @param  \App\Models\Tlist_groupe_user  $tlist_groupe_user
     * @return \Illuminate\Http\Response
     */
    public function show(Tlist_groupe_user $tlist_groupe_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tlist_groupe_user  $tlist_groupe_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Tlist_groupe_user $tlist_groupe_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tlist_groupe_user  $tlist_groupe_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tlist_groupe_user $tlist_groupe_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tlist_groupe_user  $tlist_groupe_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tlist_groupe_user $tlist_groupe_user)
    {
        //
    }
}
