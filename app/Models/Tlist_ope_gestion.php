<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_ope_gestion extends Model
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
