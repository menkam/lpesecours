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

    public static function getOptionAcreditation()
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
    }
}