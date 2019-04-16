<?php

namespace App\Models;

use App\Fonctions;
use App\Models\Tlist_groupe_user;
use DB;
use Illuminate\Database\Eloquent\Model;

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


    public static function updateMenu($request)
    {
        return DB::update("
            UPDATE 
              menus
            SET 
              id='".$request['id']."', 
              idparent='".$request['idparent']."', 
              idfils='".$request['idfils']."', 
              libelle='".$request['libelle']."', 
              lien='".$request['lien']."', 
              icon='".$request['icon']."', 
              route='".$request['route']."', 
              controller='".$request['controller']."', 
              fichiercontroller='".$request['fichiercontroller']."', 
              fichierview='".$request['fichierview']."', 
              groupeuser='".$request['groupeuser']."', 
              rang='".$request['rang']."', 
              valide='".$request['valide']."',
              statut='".$request['statut']."' 
            WHERE 
              id='".$request['id']."';
        ");
    }


    public static function getOptionIdPere($idpere, $idfils)
    {
        $option = '<option value="">-----------------</option>';
        $peres = DB::select("SELECT menus.id, menus.libelle FROM public.menus WHERE menus.idfils < '$idfils';");

        if($peres)
        {
            $option = $option.'<option value="0" selected>/</option>';
            foreach ($peres as $sol)
            {
                if($idpere==$sol->id) $option = $option.'<option value="'.$sol->id.'" selected>'.$sol->libelle.' (oldValue)</option>';
                else $option = $option.'<option value="'.$sol->id.'">'.$sol->libelle.'</option>';
            }
        }
        else
        {
            $option = $option.'<option value="0" selected>/</option>';
        }
        return $option;
    }
    public static function getOptionIdFils($idfils)
    {
        $option = '<option value="">-----------------</option>';
        for ($i=0; $i<5; $i++)
        {
            if($idfils==$i) $option = $option.'<option value="'.$i.'" selected>'.$i.' (oldvalue)</option>';
            else $option = $option.'<option value="'.$i.'">'.$i.'</option>';
        }
        return $option;
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
    public function getAllMenus()
    {
        return DB::select("SELECT * FROM   public.menus ORDER BY menus.id ASC;");
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
    public static function getLibelle($id)
    {
        if($id) return DB::select("SELECT libelle FROM menus WHERE menus.id='$id'")[0]->libelle;
        return "/";
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
        foreach (self::getAllMenus() as $value)
        {
            $action = Fonctions::colActionTable("'menu',$value->id");
            $infoGroupeUser = Tlist_groupe_user::getInfo($value->groupeuser);

            $bodyListMenus = $bodyListMenus.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.Menu::getLibelle($value->idparent).'</td>
            <td>'.$value->idfils.'</td>
            <td>'.$value->libelle.'</td>
            <td title="'.$infoGroupeUser->libelle.'">'.$infoGroupeUser->code.'</td>
            <!--td>'.$value->rang.'</td-->
            <!--td>'.$value->lien.'</td-->
            <td><i class="fa fa-'.$value->icon.'"><br>'.$value->icon.'</i> </td>
            <!--td>'.$value->route.'</td-->
            <!--td>'.$value->controller.'</td-->
            <!--td>'.$value->fichiercontroller.'</td-->
            <!--td>'.$value->fichierview.'</td-->
            <td>'.$value->valide.'</td>
            <td>'.Fonctions::formatStatut($value->statut).'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListMenus;
    }

    public static function getAllLine($id = null, $statut=null)
    {
        if(!empty($statut)) return DB::select("SELECT * FROM public.menus WHERE  menus.id = '$id' AND menus.statut = '$statut';")[0];
        if(!empty($statut)) return DB::select("SELECT * FROM public.menus WHERE menus.statut = '$statut';");
        if(!empty($id)) return DB::select("SELECT * FROM public.menus WHERE  menus.id = '$id';")[0];
        else return DB::select("SELECT * FROM public.menus;");
    }

    public static function getContentUpdate($id)
    {
        $sol = Menu::getAllLine($id, null);
        $page = "ras";
        $page ='
            <div class="form-group"  style="">
                <label class="control-label" for="id">id</label>
                <input type="number" name="id" id="id" value="'.$sol->id.'" class="form-control" data-error="Entrer l\'id." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="idparent">parent</label>
                <select name="idparent" id="idparent" class="form-control" data-error="Choisir le père." required >
                    '.Menu::getOptionIdPere($sol->idparent,$sol->idfils).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="espece">idfils</label>
                <select name="idfils" id="idfils" class="form-control" data-error="Choisir l\'id du fils." required >
                    '.Menu::getOptionIdFils($sol->idfils).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="compte_momo">libelle</label>
                <input type="text" name="libelle" id="libelle" value="'.$sol->libelle.'" class="form-control" data-error="Entrer Le libelle." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="compte2">lien</label>
                <input type="text" name="lien" id="lien" value="'.$sol->lien.'" class="form-control" data-error="Entrer le lien.">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="frais_transfert">icon</label>
                <input type="text" name="icon" id="icon" value="'.$sol->icon.'" class="form-control" data-error="Entrer l\icone." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="route">route</label>
                <input type="text" name="route" id="route" value="'.$sol->route.'" class="form-control" data-error="Entrer la valeur ."  >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="controller">controller</label>
                <input type="text" name="controller" id="controller" value="'.$sol->controller.'" class="form-control" data-error="Entrer la valeur ."  >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="fichiercontroller">fichiercontroller</label>
                <input type="text" name="fichiercontroller" id="fichiercontroller" value="'.$sol->fichiercontroller.'" class="form-control" data-error="Entrer la valeur ."  >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="fichierview">fichierview</label>
                <input type="text" name="fichierview" id="fichierview" value="'.$sol->fichierview.'" class="form-control" data-error="Entrer le nom." >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="groupeuser">groupeuser</label>
                <select name="groupeuser" id="groupeuser"class="form-control" data-error="Choisir le groupe utilisateur accessible au menu." required >
                    '.Tlist_groupe_user::getOption($sol->groupeuser).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="rang">Position</label>
                <input type="number" name="rang" id="rang" value="'.$sol->rang.'" class="form-control" data-error="Entrer la position." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="valide">valide</label>
                <input type="number" name="valide" id="valide" value="'.$sol->valide.'" class="form-control" data-error="entere une valeur." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="statut">statut</label>
                <input type="number" name="statut" id="statut" value="'.$sol->statut.'" class="form-control" data-error="Entrer le statut." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
    
}