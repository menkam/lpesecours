<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galerie_images_accueil extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'lebelle',
        'info',
        'position',
        'statut'
    ];

    protected $hidden = [
    ];


    protected $casts = [

    ];
}