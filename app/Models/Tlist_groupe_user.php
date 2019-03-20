<?php

namespace App\Models;

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
}
