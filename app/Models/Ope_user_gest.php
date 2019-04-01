<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ope_user_gest extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'id_operation',
        'id_user',
        'type',
        'date'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];
}
