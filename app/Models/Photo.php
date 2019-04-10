<?php

namespace App\Models;

use App\Fonctions;
use App\Models\Tlist_cachet;
use DB;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'date',
        'type',
        'nombre',
        'statut',
        'prix_unitaire'
    ];

    protected $hidden = [
    ];

    public static function getAllLine($id = null, $statut=null)
    {
        if(empty($statut)) {
            if (!empty($id))
                return DB::select("SELECT * FROM public.photos WHERE  photos.id = '$id' AND photos.statut = '1';")[0];
            else return DB::select("SELECT * FROM public.photos WHERE  photos.statut = '1' ORDER BY  photos.date DESC ;");
        }
        else return DB::select("SELECT * FROM public.photos ORDER BY  photos.date DESC ;");
    }

    public static  function seeder(){
        $content = '';
        foreach (Photo::getAllLine() as $value){

            $content = $content.'
                $object = new Photo();<br>
                $object->date = \''.$value->date.'\';<br>
                $object->type = \''.$value->type.'\';<br>
                $object->nombre = \''.$value->nombre.'\';<br>
                $object->prix_unitaire = \''.$value->prix_unitaire.'\';<br>
            ';

            $content = $content.'$object->save();<br><br>';
        }
        return $content;
    }
    public static function showBilan()
    {
        $total=0;
        $somqte=0;
        $rowBilan='';

        foreach (Photo::getAllLine() as $value)
        {
            $nxpu = (int)$value->nombre * (int)$value->prix_unitaire;

            $onclickView = 'onclick="loadContentUpdateBilan(\'photo\',\''.$value->id.'\');"';
            $onclickUpdate = 'onclick="loadContentUpdateBilan(\'photo\',\''.$value->id.'\');"';
            $onclickDelete = 'onclick="updateStatutBilan(\'photo\',\''.$value->id.'\');"';
            $action = Fonctions::colActionTable();

            $rowBilan = $rowBilan.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.Tlist_photo::getLibelle($value->type).'</td> <!-- type -->
                <td>'.$value->nombre.'</td> <!-- nombre -->
                <td>'.Fonctions::formatPrix($value->prix_unitaire).'</td> <!-- prix_unitaire -->
                <td>'.Fonctions::formatPrix($nxpu).'</td> <!-- nombre * PU -->
                <td>'.$action.'</td>
            </tr>';

            $total = $total+$nxpu;
            $somqte = $somqte+(int)$value->nombre;
        }

        $total = Fonctions::formatPrix($total);

        return ([$rowBilan,$somqte,$total]);
    }
}
