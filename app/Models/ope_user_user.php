<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ope_user_user extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id_operation',
   		'id_user',
   		'id_user2'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}
