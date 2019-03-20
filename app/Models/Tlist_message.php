<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_message extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'code',
   		'libelle'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}
