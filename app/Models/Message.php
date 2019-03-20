<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'type_message',
   		'objet',
   		'libelle',
   		'statut'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}
