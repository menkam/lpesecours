<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\User;
use App\Models\Operation;

class Ope_user_me extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id_operation',
   		'id_user',
   		'id_message'
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
        return $this->belongsToMany(Message::class);
    }

    protected $casts = [
        
    ];
}
