<?php

namespace App\Models;

use DB;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class Tlist_acreditation extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'libelle',
   		'numero',
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

    /*public static function getOptionAcreditation()
    {
        $gacreditations = DB::select("
            SELECT 
              tlist_acreditations.id, 
              tlist_acreditations.libelle, 
              tlist_acreditations.numero
            FROM 
              public.tlist_acreditations
            WHERE 
              tlist_acreditations.statut = '1' AND 
              tlist_acreditations.id <= '3';
        ");

        $option = '<option value="">-----------------</option>';
        foreach ($gacreditations as $value)
        {
            $option = $option.'<option value="'.$value->id.'">'.$value->numero.'=>['.$value->libelle.']</option>';
        }
        return $option;
    }*/
    public static function getOption($id=null)
    {
        $option = '<option value="">------------------</option>';

        foreach (Tlist_acreditation::getAllLine($id, null) as $value)
        {
            if(!empty($id) && $id==$value->id) $option = $option.'<option value="'.$value->id.'" selected>'.$value->libelle.'        -> (oldValue)</option>';
            else $option = $option.'<option value="'.$value->id.'">'.$value->libelle.'</option>';
        }
        return $option;
    }

    public static function getAllLine($id = null, $statut=null)
    {
        if(empty($statut))
        {
            if(!empty($id))
                return DB::select("SELECT * FROM public.tlist_acreditations WHERE  tlist_acreditations.id = '$id' AND tlist_acreditations.statut = '$statut';")[0];
            else return DB::select("SELECT * FROM public.tlist_acreditations WHERE  tlist_acreditations.statut = '$statut';");
        }
        else return DB::select("SELECT * FROM public.tlist_acreditations;");
    }

    public static function getRecetteMomo($id)
    {
        $sol = Tlist_acreditation::getAllLine('1',null);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <div class="form-group"  style="">
                <label class="control-label" for="code">Code</label>
                <input type="text" name="code" id="code" value="'.$sol->code.'" class="form-control" data-error="Entrer le Code." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="libelle">Libelle</label>
                <input type="text" name="libelle" id="libelle" value="'.$sol->libelle.'" class="form-control" data-error="Entrer le Libelle." required >
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
}