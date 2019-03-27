<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $galerie = $this->loadGlerie();

        session(['menus' => $this->loadMenus()]);
        return view('home', compact('galerie'));

        //dd($galerie);
        //return response()->json($object);

    }

    public function loadGlerie()
    {
        $galerieIA = new Galerie_images_accueil();
        $sol = '';
        $div = '';
        $galeries = $galerieIA->findImageGalerie("1");
        $nbr = 0;
        foreach ($galeries as $value){
            if($nbr==0){
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'" class="active"></li>';
                $div = $div.'<div class="item active">'.$value->info.'<br><img src="images/galerie_accueil/'.$value->libelle.'" alt="'.$value->info.'"/><br><strong style="text-align: center">'.($nbr+1).'/'.count($galeries).'<strong></div>';
                $nbr++;
            }else{
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'"></li>';
                $div = $div.'<div class="item">'.$value->info.'<br><img src="images/galerie_accueil/'.$value->libelle.'" alt="'.$value->info.'"/><br><strong style="text-align: center">'.($nbr+1).'/'.count($galeries).'<strong></div>';
                $nbr++;
            }
        }

        $sol2 = '<!--ol class="carousel-indicators">'.$sol.'</ol-->';
        $div2 = '<div class="carousel-inner thumbnail carousel0">'.$div.'</div>';
        $galerie = '<div id="carousel" class="carousel slide">'.$sol2.$div2.'<a class="left carousel-control" href="#carousel" data-slide="prev"><span style="color: aqua" class="icon-prev"></span></a>
            <a class="right carousel-control" href="#carousel" data-slide="next"><span style="color: aqua" class="icon-next"></span></a></div>';

        return $galerie;
    }
    public function loadMenus()
    {
        $menus = new Menu();
        $menu = '';
        foreach (Menu::getMenu() as $value0){
            $idmenu = $value0->id;

            if($menus->isSMenu($idmenu)){
                $menu = $menu.'<li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-'.$value0->icon.'"></i>
                        <span class="menu-text">'.$value0->libelle.'</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>            
                    <b class="arrow"></b>            
                    <ul class="submenu">';

                foreach ($menus->getSMenu($idmenu) as $value1){
                    $idsmenu = $value1->id;

                    if($menus->isSMenu($idsmenu)){
                        $menu = $menu.'<li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-'.$value1->icon.'"></i>
                            '.$value1->libelle.'
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
        
                        <b class="arrow"></b>
        
                        <ul class="submenu">';
                        foreach ($menus->getSMenu($idsmenu) as $value2){
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
        return $menu;
    }


}
