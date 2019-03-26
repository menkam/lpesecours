<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use DB;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galerieIA = new Galerie_images_accueil();
        $sol = '';
        $div = '';
        $galeries = $galerieIA->findImageGalerie("1");
        $nbr = 0;
        foreach ($galeries as $value){
            if($nbr==0){
                $sol = $sol.'<li data-target="carousel" data-slide-to="'.$nbr.'" class="active"></li>';
                $div = $div.'<div class="item active">'.$value->info.'<br><img src="images/galerie_accueil/'.$value->libelle.'" alt="'.$value->info.'"/><br><strong style="text-align: left">'.($nbr+1).'/'.count($galeries).'<strong></div>';
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

        return view('welcome', compact('galerie'));
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
}
