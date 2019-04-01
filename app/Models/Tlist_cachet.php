<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_cachet extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'fond',
        'pret',
        'espece',
        'compte_momo',
        'compte2',
        'frais_transfert',
        'commission'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];
}
