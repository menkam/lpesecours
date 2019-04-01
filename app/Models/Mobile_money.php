<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mobile_money extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'id',
        'date',
        'fond',
        'pret',
        'espece',
        'compte_momo',
        'compte2',
        'frais_transfert',
        'commission'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function getAllLine()
    {
        return DB::select("SELECT * FROM public.mobile_moneys ORDER BY  mobile_moneys.date ASC;");
    }

    public static  function seeder(){
        $content = '';
        foreach (Mobile_money::getAllLine() as $value){

            $content = $content.'
                $object = new Mobile_money();<br>
                $object->id = \''.$value->id.'\';<br>
                $object->date = \''.$value->date.'\';<br>
                $object->fond = \''.$value->fond.'\';<br>
                $object->pret = \''.$value->pret.'\';<br>
                $object->espece = \''.$value->espece.'\';<br>
                $object->compte_momo = \''.$value->compte_momo.'\';<br>
                $object->compte2 = \''.$value->compte2.'\';<br>
                $object->frais_transfert = \''.$value->frais_transfert.'\';<br>
                $object->commission = \''.$value->commission.'\';<br>
            ';

            $content = $content.'$object->save();<br><br>';
        }

        echo $content;
    }
}
