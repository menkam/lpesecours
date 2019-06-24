<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;


class Galerie_images_accueil extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'lebelle',
        'info',
        'position',
        'statut'
    ];

    protected $hidden = [
    ];


    protected $casts = [

    ];

    public static function findImageGalerie($statut = null)
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
              galerie_images_accueils.statut = '1'
            ORDER BY
              galerie_images_accueils.position ASC, 
              galerie_images_accueils.libelle ASC;

        ");
    }

    public static function loadGalerie()
    {
        $sol = '';
        $div = '';
        $galeries = Galerie_images_accueil::findImageGalerie("1");
        $nbr = 0;

        $sol2 = '<!--ol class="carousel-indicators">'.$sol.'</ol-->';
        $div2 = '<div class="carousel-inner thumbnail carousel0">'.$div.'</div>';
        $galerie = '<div id="carousel" class="carousel slide">'.$sol2.$div2.'<a class="left carousel-control" href="#carousel" data-slide="prev"><span style="color: aqua" class="icon-prev"></span></a>
            <a class="right carousel-control" href="#carousel" data-slide="next"><span style="color: aqua" class="icon-next"></span></a></div>';

        $session = "";
        $item = "";
        foreach ($galeries as $value){
            if($nbr==0){
                $item = $item.'<div class="item active"> <img alt="'.$value->info.'" src="images/galerie_accueil/'.$value->libelle.'"><h3 class="carousel-caption hidden-xs">'.$value->info.'</h3></div>';
                $nbr++;
            }else{
                $item = $item.'<div class="item"> <img alt="'.$value->info.'" src="images/galerie_accueil/'.$value->libelle.'"><h3 class="carousel-caption hidden-xs">'.$value->info.'</h3></div>';
                $nbr++;
            }
        }

        $session = '<section class="">
                <div id="carousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                        <li data-target="#carousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active"> <img alt="Tigre" src="images/galerie_accueil/'.$galeries[0]->libelle.'" width="900" height="400" ></div>
                        <div class="item"> <img alt="Tigre" src="images/galerie_accueil/'.$galeries[1]->libelle.'" width="900" height="400" ></div>
                        <div class="item"> <img alt="Tigre" src="images/galerie_accueil/'.$galeries[2]->libelle.'" width="900" height="400" ></div>
                        <div class="item"> <img alt="Tigre" src="images/galerie_accueil/'.$galeries[3]->libelle.'" width="900" height="400" ></div>
                    </div>
                </div>
            </section>';
        $session = '<div class="row">
            <div class="col-lg-offset-0 col-lg-12">
                <div id="carousel" class="carousel slide">
                    <div class="carousel-inner">'.$item.'</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group" data-toggle="buttons">
                    <!--label class="btn btn-success" id="first">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-fast-backward"></span>
                    </label-->
                    <label class="btn btn-success" id="previous">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-step-backward"></span>
                    </label>
                    <label class="btn btn-success" id="pause">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-pause"></span>
                    </label>
                    <label class="btn btn-success active" id="play">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-play"></span>
                    </label>
                    <label class="btn btn-success" id="next">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-step-forward"></span>
                    </label>
                    <!--label class="btn btn-success" id="last">
                        <input type="radio" name="options"><span class="glyphicon glyphicon-fast-forward"></span>
                    </label-->
                </div>
                <p><span class="label label-info"></span></p>
            </div>
        </div>';


        return $session;
    }
}

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
