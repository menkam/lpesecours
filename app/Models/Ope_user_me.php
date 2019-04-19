<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Fonctions;
use App\Models\Message;
use App\Models\User;
use App\Models\Operation;
use DB;

class Ope_user_me extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id_operation',
   		'id_user_recive',
   		'id_message',
   		'statut'
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

    public static function updateStatut($id, $newStatut)
    {
        if(!empty($id) && !empty($newStatut))
        {
            $date = Fonctions::getCurentDate();
            return DB::update("UPDATE ope_user_mes SET statut='$newStatut', updated_at='$date' WHERE id='$id';");
        }
        return 0;
    }
}
