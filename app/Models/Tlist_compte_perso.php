<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Tlist_compte_perso extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'code',
        'libelle',
        'statut'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function allTlist_compte_perso()
    {
        return DB::select("SELECT * FROM  public.Tlist_compte_persos WHERE  statut = '1'; ");
    }

    public static function getValeur()
    {
        return DB::select("SELECT id, code, libelle FROM Tlist_compte_persos");
    }
    public static function getLibelle($code)
    {
        return DB::select("SELECT libelle FROM Tlist_compte_persos WHERE code = '$code'");
    }

    public static function getOption($id=null)
    {
        $option = '<option value="">------------------</option>';

        foreach (self::allTlist_compte_perso() as $value)
        {
            if(!empty($id) && $id==$value->id)
                $option = $option.'<option value="'.$value->id.'" selected>'.$value->libelle.'        -> (oldValue)</option>';
            else
                $option = $option.'<option value="'.$value->id.'">'.$value->libelle.'</option>';
        }
        return $option;
    }
}
