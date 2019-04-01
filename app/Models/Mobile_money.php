<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobile_money extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'code',
        'libelle'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];
}
