<?php

namespace App\Models;

use DB;
use App\Models\User;
use App\Fonctions;

use Illuminate\Database\Eloquent\Model;


class Tlist_groupe_user extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'code',
   		'libelle',
   		'statut'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function getOption($id)
    {
        $groupeUser = DB::select("SELECT * FROM public.tlist_groupe_users;");
        $option = '<option value="">-----------------</option>';
        foreach ($groupeUser as $value)
        {
            if($id==$value->id) $option = $option.'<option value="'.$value->id.'" selected>'.$value->code.'=>['.$value->libelle.']</option>';
            else $option = $option.'<option value="'.$value->id.'">'.$value->code.'=>['.$value->libelle.']</option>';
        }
        return $option;
    }

    /*public static function getOptionGroupeUser0($id)
    {
        $groupeUser = DB::select("
            SELECT 
              tlist_groupe_users.id, 
              tlist_groupe_users.code, 
              tlist_groupe_users.libelle
            FROM 
              public.tlist_groupe_users
            WHERE 
              tlist_groupe_users.statut = '1' AND 
              tlist_groupe_users.id != '1' AND
              tlist_groupe_users.id != '6' AND
              tlist_groupe_users.id != '2';
        ");

        $option = '<option value="">-----------------</option>';
        foreach ($groupeUser as $value)
        {
            $option = $option.'<option value="'.$value->id.'">'.$value->code.'=>['.$value->libelle.']</option>';
        }
        return $option;
    }*/

    /**
     * show list list Groupe user
     */
    public static function ListGroupeUsers()
    {
        $bodyListGroupeUser = '';
        $numero = 1;
        foreach (Tlist_groupe_user::all() as $value)
        {
            $action = Fonctions::colActionTable("'groupeuser',$value->id");

            $bodyListGroupeUser = $bodyListGroupeUser.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->code.'</td>
            <td>'.$value->libelle.'</td>
            <td>'.Fonctions::formatStatut($value->statut).'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListGroupeUser;
    }

    public static function getAllLine($id = null, $statut=null)
    {
        if(!empty($statut) && !empty($id)) return DB::select("SELECT * FROM public.tlist_groupe_users WHERE  tlist_groupe_users.id = '$id' AND  tlist_groupe_users.statut = '$statut';")[0];
        elseif(!empty($statut)) return DB::select("SELECT * FROM public.tlist_groupe_users WHERE tlist_groupe_users.statut = '$statut';");
        elseif(!empty($id)) return DB::select("SELECT * FROM public.tlist_groupe_users WHERE  tlist_groupe_users.id = '$id';")[0];
        else return DB::select("SELECT * FROM public.tlist_groupe_users;");
    }
    public static function getContentUpdate($id)
    {
        $sol = Tlist_groupe_user::getAllLine($id,null);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <div class="form-group"  style="">
                <label class="control-label" for="code">code</label>
                <input type="text" name="code" id="code" value="'.$sol->code.'" class="form-control" data-error="Entrer le code." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="libelle">libelle</label>
                <input type="text" name="libelle" id="libelle" value="'.$sol->libelle.'" class="form-control" data-error="Entrer le libelle." required >
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

    public static function getTlistGroupUser($id)
    {
        $sol = Tlist_groupe_user::getAllLine('1',null);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <div class="form-group"  style="">
                <label class="control-label" for="code">Code</label>
                <input type="number" name="code" id="code" value="'.$sol->code.'" class="form-control" data-error="Entrer le code." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="libelle">Libelle</label>
                <input type="number" name="libelle" id="libelle" value="'.$sol->libelle.'" class="form-control" data-error="Entrer lelibelle." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="statut">Statut</label>
                <input type="number" name="statut" id="statut" value="'.$sol->statut.'" class="form-control" data-error="Entrer le statut." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }

    public static function getInfo($id)
    {
        return DB::select("SELECT code, libelle FROM tlist_groupe_users WHERE tlist_groupe_users.id='$id'")[0];
    }
}
