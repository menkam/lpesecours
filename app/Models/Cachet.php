<?php

namespace App\Models;

use App\Fonctions;
use Validator;
use App\FichiersCSV;
use Illuminate\Http\Request;
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

    public static function createCachet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Cachet::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire'],
            ]);
            if($save)
                return response()->json(['success'=>'Added Date: '.$request['date'].' -> success.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function createGlobalCachet($arrayss)
    {
        $sol = "<h1><u>Debut de la mise à jours Cachet</u></h1><br>";
        $arrays = explode(Fonctions::delimiteurRows(), $arrayss);
        //dd($arrays);
        for($i=0; $i<count($arrays); $i++)
        {
            $array = explode(";", $arrays[$i]);
            if(count($array)==7)
            {
                if(!self::isExcist($array[0],$array[1],$array[2],$array[3]))
                {
                    $request = new Request([
                        'date' => $array[0],
                        'type' => $array[1],
                        'nombre' => $array[2],
                        'prix_unitaire' => $array[3],
                        'statut' => $array[4],
                        'created_at' => $array[5],
                        'updated_at' => $array[6]
                    ]);
                    $sol = $sol.self::createCachet($request).'<br>';
                }
                else
                {
                    //$sol = $sol.response()->json(['warnings'=> 'Date: '.$array[0].' type '.$array[1].' -> existe deja!!!.']).'<br>';
                }
            }
            else
            {
                $sol = $sol.response()->json(['error'=> 'Le Format de Saisie de Données est Invalide !!!'.'<br>']);
            }
        }
        $sol = $sol."<h1><u>Fin de la mise à jours photo</u></h1><br>";
        return $sol;
    }
    public static function saveCachet()
    {
        $lignes = array();
        $rows = self::getAllLine();
        $lignes[] = array('date','type','nombre','prix_unitaire','statut','created_at','updated_at');
        foreach ($rows as $val)
        {
            $lignes[] = array(
                $val->date,
                $val->type,
                $val->nombre,
                $val->prix_unitaire,
                $val->statut,
                $val->created_at,
                $val->updated_at,
            );
        }
        //dd($lignes);
        return FichiersCSV::ecriture("cachet", $lignes);
    }
    public static function isExcist($date,$type,$nombre,$prixU)
    {
        return DB::select("SELECT COUNT(date) FROM cachets WHERE date='$date' AND type='$type' AND nombre='$nombre' AND prix_unitaire='$prixU';")[0]->count;
    }


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
        foreach (self::getAllLine() as $value){

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

        foreach (self::getAllLine() as $value)
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
        $sol = self::getAllLine($id);
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
