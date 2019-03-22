<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ope_user_gale extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id_operation',
        'id_user',
        'id_galerie'
    ];

    protected $hidden = [
    ];

    public function id_operation()
    {
        return $this->belongsToMany(Operation::class);
    }

    public function id_user()
    {
        return $this->belongsToMany(User::class);
    }

    public function id_message()
    {
        return $this->belongsToMany(Galerie_images_accueil::class);
    }

    protected $casts = [

    ];
}
