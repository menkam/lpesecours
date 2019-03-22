<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
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

        $sol = '';
        $div = '';
        $galeries = $this->findImageGalerie("1");
        $nbr = 0;
        foreach ($galeries as $value){
            if($nbr==0){
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'" class="active"></li>';
                $div = $div.'<div class="item active"><img src="images/galerie_accueil/'.$galeries[0]->libelle.'" alt="'.$galeries[0]->id.'"/></div>';
                $nbr++;
            }else{
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'"></li>';
                $div = $div.'<div class="item"><img src="images/galerie_accueil/'.$galeries[0]->libelle.'" alt="'.$galeries[0]->id.'"/></div>';
                $nbr++;
            }
        }
        $sol2 = '<ol class="carousel-indicators">'.$sol.'</ol>';
        $div2 = '<div class="carousel-inner thumbnail carousel0">'.$div.'</div>';
        $galerie = '<div id="carousel" class="carousel slide">'.$sol2.$div2.'<a class="left carousel-control" href="#carousel" data-slide="prev"><span style="color: aqua" class="icon-prev"></span></a>
            <a class="right carousel-control" href="#carousel" data-slide="next"><span style="color: aqua" class="icon-next"></span></a></div>
            <script type="text/javascript">  $(function(){ $(".carousel").carousel({ interval: 5000 }); }) </script>';

        //return view('home', compact('galerie'));
        //$galeries = $this->findImageGalerie("1");
        dd($galeries);
        //return response()->json($object);
    }

    public function findImageGalerie($statut)
    {
        return DB::select("
            SELECT 
              galerie_images_accueils.id, 
              galerie_images_accueils.libelle, 
              galerie_images_accueils.statut
            FROM 
              public.galerie_images_accueils
            WHERE 
              galerie_images_accueils.statut = '$statut';
        ");
    }


}
