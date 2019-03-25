<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        //return view('welcome', compact('menu','galerie'));
        //dd($menu);
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
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $menu = '';
        foreach ($this->getMenu() as $value0){
            $idmenu = $value0->id;

            if($this->isSMenu($idmenu)){
                $menu = $menu.'<li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-'.$value0->icon.'"></i>
                        <span class="menu-text">'.$value0->libelle.'</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>            
                    <b class="arrow"></b>            
                    <ul class="submenu">';

                foreach ($this->getSMenu($idmenu) as $value1){
                    $idsmenu = $value1->id;

                    if($this->isSMenu($idsmenu)){
                        $menu = $menu.'<li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-'.$value1->icon.'"></i>
                            '.$value1->libelle.'
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
        
                        <b class="arrow"></b>
        
                        <ul class="submenu">';
                        foreach ($this->getSMenu($idsmenu) as $value2){
                            $menu = $menu.'<li class="">
                                <a href="'.$value2->route.'">
                                    <i class="menu-icon fa fa-'.$value2->icon.'"></i>
                                    '.$value2->libelle.'
                                </a>        
                                <b class="arrow"></b>
                            </li>';
                        }
                        $menu = $menu.'</ul></li>';
                    }else{
                        $menu = $menu.'<li class="">
                            <a href="'.$value1->route.'" class="">
                                <i class="menu-icon fa fa-'.$value1->icon.'"></i>
                                '.$value1->libelle.'
                            </a>
                        </li>';
                    }
                }
                $menu = $menu.'</ul></li>';

            }else{
                $menu = $menu.'<li class="">
                    <a href="'.$value0->route.'">
                        <i class="menu-icon fa fa-'.$value0->icon.'"></i>
                        <span class="menu-text">'.$value0->libelle.'</span>
                    </a>
                </li>';
            }

        }

        return response()->json($menu);
        //echo($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }


    public function getMenu(){
        return DB::select("
            SELECT 
              menus.id, 
              menus.idparent, 
              menus.idfils, 
              menus.libelle, 
              menus.lien, 
              menus.icon, 
              menus.route, 
              menus.position
            FROM 
              public.menus
            WHERE 
              menus.statut = '1' AND 
              menus.idfils = '1'
            ORDER BY
              menus.position ASC;
        ");
    }
    public function getSMenu($idmenu){
        return DB::select("
            SELECT 
              menus.id, 
              menus.idparent, 
              menus.idfils, 
              menus.libelle, 
              menus.lien, 
              menus.icon, 
              menus.route, 
              menus.position
            FROM 
              public.menus
            WHERE 
              menus.statut = '1' AND 
              menus.idparent = '$idmenu'
            ORDER BY
              menus.position ASC;
        ");
    }
    public function isSMenu($idmenu){
        return DB::select("
          SELECT 
            count(*) 
          FROM 
            menus 
          WHERE 
            menus.statut = '1' AND 
            menus.idparent = '$idmenu';
        ")[0]->count;
    }
}









