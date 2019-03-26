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
