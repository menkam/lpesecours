<?php

namespace App\Models;

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
}