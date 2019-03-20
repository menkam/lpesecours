<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'email',
   		'token',
   		'created_at'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}
