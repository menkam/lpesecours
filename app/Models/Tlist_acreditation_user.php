<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_acreditation_user extends Model
{
    protected $guarded = array();


    protected $fillable = [
        'tlist_acreditation_id', 'user_id',
    ];
}
