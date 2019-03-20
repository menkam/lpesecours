<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ope_user_me extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id_operation',
   		'id_user',
   		'id_message'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}
