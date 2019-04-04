<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tlist_photo extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'code',
        'libelle'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function allPhoto()
    {
        return DB::select("SELECT * FROM  public.tlist_photos WHERE  tlist_photos.statut = '1'; ");
    }
    public static function getLibelle($id)
    {
        $result = DB::select("
            SELECT 
              tlist_photos.code, 
              tlist_photos.libelle
            FROM 
              public.tlist_photos
            WHERE 
              tlist_photos.id = '$id';
        ");

        return $result[0]->libelle;
    }
    public static function getOption($id=null)
    {
        $option = '<option value="">------------------</option><br>';

        foreach (Tlist_photo::allPhoto() as $value)
        {
            if(!empty($id) && $id==$value->id) $option = $option.'<option value="'.$value->id.'" selected>'.$value->libelle.'        -> (oldValue)</option>';
            else  $option = $option.'<option value="'.$value->id.'">'.$value->libelle.'</option><br>';
        }
        return $option;
    }
}
