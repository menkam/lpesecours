<?php

namespace App\Models;

use App\Fonctions;
use Validator;
use App\FichiersCSV;
use Illuminate\Http\Request;
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

    public static function createPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Photo::create([
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

    public static function createGlobalPhoto($arrayss)
    {
        $sol = "<h1><u>Debut de la mise à jours Photo</u></h1><br>";
        $arrays = explode(Fonctions::delimiteurRows(), $arrayss);
        //dd($arrayss);
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
                    $sol = $sol.self::createPhoto($request).'<br>';
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

    public static function savePhoto()
    {
        $lignes = array();
        $photos = self::getAllLine();
        $lignes[] = array('date','type','nombre','prix_unitaire','statut','created_at','updated_at');
        foreach ($photos as $val)
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
        return FichiersCSV::ecriture("photo", $lignes);
    }
    public static function isExcist($date,$type,$nombre,$prixU)
    {
        return DB::select("SELECT COUNT(date) FROM photos WHERE date='$date' AND type='$type' AND nombre='$nombre' AND prix_unitaire='$prixU';")[0]->count;
    }

    public static function updatePhoto($request)
    {
        $date = Fonctions::getCurentDate();
        return DB::update("
            UPDATE 
              photos
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
        if(empty($statut)) {
            if (!empty($id))
                return DB::select("SELECT * FROM public.photos WHERE  photos.id = '$id' AND photos.statut = '1';")[0];
            else return DB::select("SELECT * FROM public.photos WHERE  photos.statut = '1' ORDER BY  photos.date DESC ;");
        }
        else return DB::select("SELECT * FROM public.photos ORDER BY  photos.date DESC ;");
    }

    public static  function seeder(){
        $content = '';
        foreach (self::getAllLine() as $value){

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

        foreach (self::getAllLine() as $value)
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

    public static function getContentUpdate($id)
    {
        $sol = self::getAllLine($id);
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
