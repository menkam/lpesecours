<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Tlist_devise extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'libelle',
        'valeur'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function getValeur()
    {
        return DB::select("SELECT valeur FROM Tlist_devises");
    }
}
