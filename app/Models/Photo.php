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

            $action = Fonctions::colActionTable("'photo',$value->id");

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

    public static function getRecettePhoto($id)
    {
        $sol = Photo::getAllLine($id);
        $page = "ras";
        $page = '
            <input type="hidden" value="'.$sol->id.'" id="id" name="id">
            <input type="hidden" value="'.$sol->date.'" id="date" name="date">
            <div class="form-group"  style="">
                <label class="control-label" for="type">Type de cachet</label>
                <select name="type" id="type" class="form-control" data-error="Choisir le type de photo." required >
                    '.Tlist_photo::getOption($sol->type).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="number" name="nombre" id="nombre" value="'.$sol->nombre.'" class="form-control" data-error="Entrer le nombre de photo." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="prix_unitaire">Prix Unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" value="'.$sol->prix_unitaire.'" class="form-control" data-error="Entrer le prix unitaire." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
}
