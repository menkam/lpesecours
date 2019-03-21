<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tlist_message;

class Message extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'type_message',
   		'objet',
   		'libelle',
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
