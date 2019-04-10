<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Fonctions;
use DB;

class Menu extends Model
{
    protected $guarded = array();

    protected $groupeuser;

    protected $fillable = [
        'id',
        'idparent',
        'idfils',
        'libelle',
        'lien',
        'route',
        'icon',
        'controller ',
        'fichiercontroller ',
        'fichierview',
        'groupeuser',
        'rang',
        'valide',
        'statut'
    ];

    public function __construct($groupeuser=null)
    {
        $this->groupeuser = $groupeuser;
    }

    protected $hidden = [
    ];


    public function type_message()
    {
        return $this->belongsToMany(Tlist_message::class);
    }


    protected $casts = [

    ];

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
              menus.controller , 
              menus.groupeuser, 
              menus.rang, 
              menus.statut
            FROM 
              public.menus
            WHERE 
              menus.groupeuser >= $this->groupeuser AND 
              menus.statut = '1' AND 
              menus.idfils = '1'
            ORDER BY
              menus.rang ASC;
        ");
    }
    public function getAllMenu(){
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
              menus.fichiercontroller, 
              menus.fichierview, 
              menus.groupeuser, 
              menus.rang, 
              menus.valide, 
              menus.statut
            FROM 
              public.menus
            WHERE 
              menus.groupeuser >= $this->groupeuser
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
              menus.fichiercontroller, 
              menus.fichierview, 
              menus.groupeuser, 
              menus.rang, 
              menus.statut
            FROM 
              public.menus
            WHERE 
                menus.route NOT LIKE ''
            ORDER BY
              menus.id ASC;
        ");
    }
    public static function getMenuForController(){
        return DB::select("
            SELECT 
              menus.id, 
              menus.libelle, 
              menus.route, 
              menus.controller, 
              menus.fichiercontroller, 
              menus.fichierview, 
              menus.groupeuser
            FROM 
              public.menus
            WHERE 
                menus.fichiercontroller NOT LIKE ''
            ORDER BY
              menus.id ASC;
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
              menus.controller, 
              menus.fichiercontroller, 
              menus.fichierview, 
              menus.route, 
              menus.rang
            FROM 
              public.menus
            WHERE 
              menus.groupeuser >= $this->groupeuser AND 
              menus.statut = '1' AND 
              menus.idparent = '$idmenu'
            ORDER BY
              menus.rang ASC;
        ");
    }
    public function isSMenu($idmenu){
        return DB::select("
          SELECT 
            count(*) 
          FROM 
            menus 
          WHERE 
            menus.groupeuser >= $this->groupeuser AND 
            menus.statut = '1' AND 
            menus.idparent = '$idmenu';
        ")[0]->count;
    }


    /**
     ** gérération menu
     **/
    public static  function genererMenuSeeder(){
        $content = '';
        $menus = Menu::getAllMenu();

        foreach ($menus as $value){

            $content = $content.'
                $object = new Menu();<br>
                $object->id = \''.$value->id.'\';<br>
                $object->idparent = \''.$value->idparent.'\';<br>
                $object->idfils = \''.$value->idfils.'\';<br>
                $object->libelle = \''.$value->libelle.'\';<br>
                $object->groupeuser = \''.$value->groupeuser.'\';<br>
                $object->rang = \''.$value->rang.'\';<br>
            ';
            if(!empty($value->lien))
                $content = $content.'$object->lien = \''.$value->lien.'\';<br>';
            if(!empty($value->icon))
                $content = $content.'$object->icon = \''.$value->icon.'\';<br>';
            if(!empty($value->route))
                $content = $content.'$object->route = \''.$value->route.'\';<br>';
            if(!empty($value->controller))
                $content = $content.'$object->controller = \''.$value->controller.'\';<br>';
            if(!empty($value->fichiercontroller))
                $content = $content.'$object->fichiercontroller = \''.$value->fichiercontroller.'\';<br>';
            if(!empty($value->fichierview))
                $content = $content.'$object->fichierview = \''.$value->fichierview.'\';<br>';

            $content = $content.'$object->save();<br><br>';
        }

        return $content;
    }
    public static function loadMenus($groupeuser=null)
    {
        $menus = new Menu($groupeuser);
        $menu = '';
        foreach ($menus->getMenu() as $value0){
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


    /**
     * show list menu
     */
    public function ListMenus()
    {
        $bodyListMenus = '';
        $numero = 1;
        foreach (self::getAllMenu() as $value)
        {
            $action = Fonctions::colActionTable();



            $bodyListMenus = $bodyListMenus.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->idparent.'</td>
            <td>'.$value->idfils.'</td>
            <td>'.$value->libelle.'</td>
            <td>'.$value->groupeuser.'</td>
            <!--td>'.$value->rang.'</td-->
            <!--td>'.$value->lien.'</td-->
            <td><i class="fa fa-'.$value->icon.'"><br>'.$value->icon.'</i> </td>
            <!--td>'.$value->route.'</td-->
            <!--td>'.$value->controller.'</td-->
            <!--td>'.$value->fichiercontroller.'</td-->
            <!--td>'.$value->fichierview.'</td-->
            <td>'.$value->valide.'</td>
            <td>'.$value->statut.'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListMenus;
    }
}