<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'type_operation'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];
}