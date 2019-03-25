<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'idparent',
        'idfils',
        'libelle',
        'lien',
        'route',
        'icon',
        'position',
        'statut'
    ];

    protected $hidden = [
    ];

    public function type_message()
    {
        return $this->belongsToMany(Tlist_message::class);
    }


    protected $casts = [

    ];
}
