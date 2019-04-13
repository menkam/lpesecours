<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tlist_cachet extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'fond',
        'pret',
        'espece',
        'compte_momo',
        'compte2',
        'frais_transfert',
        'commission'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function allCachet()
    {
        return DB::select("SELECT * FROM  public.tlist_cachets WHERE  tlist_cachets.statut = '1'; ");
    }

    public static function getLibelle($id)
    {
        $result = DB::select("
            SELECT 
              tlist_cachets.code, 
              tlist_cachets.libelle
            FROM 
              public.tlist_cachets
            WHERE 
              tlist_cachets.id = '$id';
        ");

        return $result[0]->libelle;
    }

    public static function getOption($id=null)
    {
        $option = '<option value="">------------------</option>';

        foreach (Tlist_cachet::allCachet() as $value)
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
                return DB::select("SELECT * FROM public.tlist_cachets WHERE  tlist_cachets.id = '$id' AND tlist_cachets.statut = '$statut';")[0];
            else return DB::select("SELECT * FROM public.tlist_cachets WHERE  tlist_cachets.statut = '$statut';");
        }
        else return DB::select("SELECT * FROM public.tlist_cachets;");
    }

    public static function getRecetteMomo($id)
    {
        $sol = Tlist_cachet::getAllLine($id,null);
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
