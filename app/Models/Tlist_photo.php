<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_photo extends Model
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
