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
                $div = $div.'<div class="item active">'.$value->info.'<img src="images/galerie_accueil/'.$value->libelle.'" alt="'.$value->info.'"/></div>';
                $nbr++;
            }else{
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'"></li>';
                $div = $div.'<div class="item">'.$value->info.'<img src="images/galerie_accueil/'.$value->libelle.'" alt="'.$value->info.'"/></div>';
                $nbr++;
            }
        }

        $sol2 = '<ol class="carousel-indicators">'.$sol.'</ol>';
        $div2 = '<div class="carousel-inner thumbnail carousel0">'.$div.'</div>';
        $galerie = '<div id="carousel" class="carousel slide">'.$sol2.$div2.'<a class="left carousel-control" href="#carousel" data-slide="prev"><span style="color: aqua" class="icon-prev"></span></a>
            <a class="right carousel-control" href="#carousel" data-slide="next"><span style="color: aqua" class="icon-next"></span></a></div>';

        return view('home', compact('galerie'));
        //dd($galerie);
        //return response()->json($object);
        
        /**
        ** gérération galerie_accueilSeeder
        **/
        /*
        $content = '';
        $nbr = 1;
        $galeri = Galerie_images_accueil::all();
        foreach ($galeri as $value){

          $content = $content.'
            /////////'.$nbr.'//////////<br>
            $object = new Galerie_images_accueil();<br>
            $object->libelle = \''.$value->libelle.'\';<br>
            $object->info = \''.$value->info.'\';<br>
            $object->position = \''.$value->position.'\';<br>
            $idLastGalerie = $object->save();<br><br>

            $object = new Operation();<br>
            $object->type_operation = $typeOperation[\'id\'];<br>
            $idLastOperation = $object->save();<br><br>

            $object = new Ope_user_gale();<br>
            $object->id_operation = $idLastOperation;<br>
            $object->id_user = $user[\'id\'];<br>
            $object->id_galerie = $idLastGalerie;<br>
            $object->save();<br>
            <br>
          ';
          $nbr++;
        }

        echo $content;*/

        

    }

    public function findImageGalerie($statut)
    {
        return DB::select("
            SELECT 
              galerie_images_accueils.id, 
              galerie_images_accueils.libelle, 
              galerie_images_accueils.info, 
              galerie_images_accueils.position
            FROM 
              public.galerie_images_accueils
            WHERE 
              galerie_images_accueils.statut = '$statut'
            ORDER BY
              galerie_images_accueils.position ASC, 
              galerie_images_accueils.libelle ASC;

        ");
    }


}
