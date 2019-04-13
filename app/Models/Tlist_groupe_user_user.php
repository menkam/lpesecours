<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Tlist_groupe_user_user extends Model
{
    protected $guarded = array();


    protected $fillable = [
        'tlist_groupe_user_id', 'user_id',
    ];

    public static function getInfo($id)
    {
        return DB::select("
          SELECT 
            code, libelle 
          FROM 
            tlist_groupe_users,
            tlist_groupe_user_user,
            users
          WHERE 
            users.id='$id' AND 
            users.id=user_id AND
            tlist_groupe_users.id=tlist_groupe_user_id
            ")[0];
    }

    
}
