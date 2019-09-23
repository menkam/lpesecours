<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Operation;

class Ope_user_user extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id_operation',
   		'id_user',
   		'id_user2'
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

    protected $casts = [
        
    ];
}
