<?php

namespace App\Models;

use App\Fonctions;
use App\Models\Tlist_cachet;
use DB;

use Illuminate\Database\Eloquent\Model;


class Cachet extends Model
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

    public static function updateCachet($request)
    {
        $date = Fonctions::getCurentDate();
        return DB::update("
            UPDATE 
              cachets
            SET 
              date='".$request['date']."', 
              type='".$request['type']."', 
              nombre='".$request['nombre']."', 
              prix_unitaire='".$request['prix_unitaire']."', 
              updated_at='$date'
            WHERE 
              id='".$request['id']."';
        ");
    }

    public static function getAllLine($id = null, $statut=null)
    {
        if(empty($statut))
        {
            if(!empty($id))
                return DB::select("SELECT * FROM public.cachets WHERE  cachets.id = '$id' AND cachets.statut = '1';")[0];
            else return DB::select("SELECT * FROM public.cachets WHERE  cachets.statut = '1' ORDER BY  cachets.date DESC;");
        }
        else return DB::select("SELECT * FROM public.cachets ORDER BY  cachets.date DESC;");
    }

    public static  function seeder(){
        $content = '';
        foreach (Cachet::getAllLine() as $value){

            $content = $content.'
                $object = new Cachet();<br>
                $object->date = \''.$value->date.'\';<br>
                $object->type = \''.$value->type.'\';<br>
                $object->nombre = \''.$value->nombre.'\';<br>
                $object->prix_unitaire = \''.$value->prix_unitaire.'\';<br>
            ';

            $content = $content.'$object->save();<br><br>';
        }

        echo $content;
    }
    /**
     * show bilan
     */
    public static function showBilan()
    {
        $total=0;
        $somqte=0;
        $rowBilan='';

        foreach (Cachet::getAllLine() as $value)
        {
            $nxpu = (int)$value->nombre * (int)$value->prix_unitaire;
            $action = Fonctions::colActionTable("'cachet',$value->id");

            $rowBilan = $rowBilan.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.Tlist_cachet::getLibelle($value->type).'</td> <!-- type -->
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

    public static function getContentUpdate($id)
    {
        $sol = Cachet::getAllLine($id);
        $page = '
            <input type="hidden" value="'.$sol->id.'" id="id" name="id">
            <input type="hidden" value="'.$sol->date.'" id="date" name="date">
            <div class="form-group"  style="">
                <label class="control-label" for="type">Type de cachet</label>
                <select name="type" id="type" class="form-control" data-error="Choisir le type de cachet." required >
                    '.Tlist_cachet::getOption($sol->type).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="number" name="nombre" id="nombre" value="'.$sol->nombre.'" class="form-control" data-error="Entrer le nombre de cachet." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="prix_unitaire">Prix Unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" value="'.$sol->prix_unitaire.'" class="form-control" data-error="Entrer le prix Unitaire." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
}
