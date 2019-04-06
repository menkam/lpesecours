<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tlist_groupe_user_user extends Model
{
    protected $guarded = array();


    protected $fillable = [
        'role_id', 'user_id',
    ];
}
