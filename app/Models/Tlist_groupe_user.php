<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getOptionGroupeUser()
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
    }
}
