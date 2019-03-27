<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'idparent',
        'idfils',
        'libelle',
        'lien',
        'route',
        'icon',
        'contoller',
        'groupeuser',
        'position',
        'statut'
    ];

    protected $hidden = [
    ];

    public function type_message()
    {
        return $this->belongsToMany(Tlist_message::class);
    }


    protected $casts = [

    ];

    public static function getMenu(){
        return DB::select("
            SELECT 
              menus.id, 
              menus.idparent, 
              menus.idfils, 
              menus.libelle, 
              menus.lien, 
              menus.icon, 
              menus.route, 
              menus.contoller, 
              menus.groupeuser, 
              menus.position, 
              menus.statut
            FROM 
              public.menus
            WHERE 
              menus.statut = '1' AND 
              menus.idfils = '1'
            ORDER BY
              menus.position ASC;
        ");
    }
    public static function getAllMenu(){
        return DB::select("
            SELECT 
              menus.id, 
              menus.idparent, 
              menus.idfils, 
              menus.libelle, 
              menus.lien, 
              menus.icon, 
              menus.route, 
              menus.controller, 
              menus.groupeuser, 
              menus.position, 
              menus.statut
            FROM 
              public.menus
            ORDER BY
              menus.id ASC;
        ");
    }
    public static function getAllMenuGener(){
        return DB::select("
            SELECT 
              menus.id, 
              menus.idparent, 
              menus.idfils, 
              menus.libelle, 
              menus.lien, 
              menus.icon, 
              menus.route, 
              menus.controller, 
              menus.fichierController, 
              menus.fichierView, 
              menus.groupeuser, 
              menus.position, 
              menus.statut
            FROM 
              public.menus
            WHERE 
                menus.route NOT LIKE ''
            ORDER BY
              menus.id ASC;
        ");
    }
    public static function getSMenu($idmenu){
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
    public static function isSMenu($idmenu){
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




    /**
     ** gérération galerie_accueilSeeder
     **/
    public static  function genererMenuSeeder(){
        $content = '';
        $menus = getAllMenu();
        foreach ($menus as $value){

            $content = $content.'
                $object = new Menu();<br>
                $object->id = \''.$value->id.'\';<br>
                $object->idparent = \''.$value->idparent.'\';<br>
                $object->idfils = \''.$value->idfils.'\';<br>
                $object->libelle = \''.$value->libelle.'\';<br>
                $object->lien = \''.$value->lien.'\';<br>
                $object->icon = \''.$value->icon.'\';<br>
                $object->route = \''.$value->route.'\';<br>
                $object->contoller = \''.$value->contoller.'\';<br>
                $object->groupeuser = \''.$value->groupeuser.'\';<br>
                $object->position = \''.$value->position.'\';<br>
                $object->position = \''.$value->statut.'\';<br>
                $object->save();<br><br>
            ';
        }

        echo $content;
    }
}