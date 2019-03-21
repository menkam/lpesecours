<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tlist_operation;

class Operation extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'type_operation'
   	];

   	protected $hidden = [
    ];

    public function type_operation()
    {
        return $this->belongsToMany(Tlist_operation::class);
    }

    protected $casts = [
        
    ];
}