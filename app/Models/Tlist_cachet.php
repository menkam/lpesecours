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
    public static function getOption()
    {
        $option = '<option value="">------------------</option>';

        foreach (Tlist_cachet::allCachet() as $value)
        {
            $option = $option.'<option value="'.$value->id.'">'.$value->libelle.'</option>';
        }
        return $option;
    }
}
