<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cachet extends Model
{
    protected $fillable = [
        'id',
        'date',
        'type',
        'nombre',
        'prix_unitaire'
    ];

    protected $hidden = [
    ];

    public static function getAllLine()
    {
        return DB::select("SELECT * FROM public.cachets ORDER BY  cachets.date ASC;");
    }

    public static  function seeder(){
        $content = '';
        foreach (Cachet::getAllLine() as $value){

            $content = $content.'
                $object = new Cachet();<br>
                $object->id = \''.$value->id.'\';<br>
                $object->date = \''.$value->date.'\';<br>
                $object->type = \''.$value->type.'\';<br>
                $object->nombre = \''.$value->nombre.'\';<br>
                $object->prix_unitaire = \''.$value->prix_unitaire.'\';<br>
            ';

            $content = $content.'$object->save();<br><br>';
        }

        echo $content;
    }
}
