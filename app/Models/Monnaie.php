<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tlist_devise;
use App\Fonctions;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class Monnaie extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'date',
        'devise',
        'nombre'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    protected static function validator($request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'nombre' => 'required|string|min:15|max:23'
        ]);
        return $validator;
    }

    public static function createMonnaie(Request $request)
    {
        $validator = self::validator($request);
        if ($validator->passes()) {
            $save = self::create([
                'date' => $request['date'],
                'nombre' => $request['nombre']
            ]);
            if($save->id)
                return response()->json(['success'=> 'Date: '.$request['date'].' -> Added Monnaie success.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function updateValeur($request)
    {
        $validator = self::validator($request);
        if ($validator->passes()) {
            $update = DB::update("UPDATE monnaies SET nombre='".$request['nombre']."' WHERE date='".$request['date']."';");
            if($update)
                return response()->json(['success'=> 'Date: '.$request['date'].' -> Update Monnaie success.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function getNombre($date)
    {
        return DB::select("SELECT espece FROM mobile_moneys WHERE date='$date';");
    }

    public static function getSomme($date)
    {
        $resul = "";
        $nombre = "";
        $montant = Tlist_devise::getValeur();
        $nombres = self::getNombre($date);
        if($nombres)
        {
            $resul = 0;
            $nombre = explode(":", $nombres[0]->espece);
            for($i=0; $i<count($nombre); $i++)
            {
                $resul = $resul + $montant[$i]->valeur * (int)$nombre[$i];
            }
            $nombre = $nombres[0]->espece;
        }
        return [$resul,$nombre];
    }
    public static function somme($detail)
    {
        $resul = 0;
        $montant = Tlist_devise::getValeur();
        $nombre = explode(":", $detail);
        for($i=0; $i<count($nombre); $i++)
        {
            $resul = $resul + $montant[$i]->valeur * (int)$nombre[$i];
        }
        return $resul;
    }

    public static function getContentAdd()
    {
        $page = 'Date Introuvable !!!';
        $devise = Tlist_devise::all();
        $rowDevise = "";
        $nbr = 1;
        foreach ($devise as $value)
        {
            $rowDevise = $rowDevise.'<tr>
                <td><label class="control-label" for="date">'.$value->libelle.' <b>('.Fonctions::formatPrix($value->valeur).')</b></label></td>
                <td><input class="form-control"type="number" name="nbr_'.$nbr.'" value="0"></td>
            </tr>';
            $nbr++;
        }

        $page = '<table  class="table table-hover">
            <input type="hidden" name="typeSave0" value="saveMonnaie">
            <!--tr>
                <td><center><label class="control-label" for="date"><b>DEVISE</b></label></center></td>
                <td><center><label class="control-label" for="date"><b>NOMBRE</b></label></center></td>
            </tr-->            
            '.$rowDevise.'
            <tr>
                <td><label class="control-label" for=""><b>TOTAL</b></label></td>
                <td id="totalMonnaieMomo">0 FCFA</td>
            </tr>
        </table>';
        return $page;

    }

    public static function getContentUpdate($date)
    {
        $page = 'Vide';
        if(!empty($date))
        {
            $devise = Tlist_devise::all();
            $nombres = self::getNombre($date);
            $nombre = explode(":", $nombres[0]->espece);
            $rowDevise = "";
            $nbr = 0;
            foreach ($devise as $value)
            {
                $rowDevise = $rowDevise.'<tr>
                <td><label class="control-label" for="date">'.$value->libelle.' <b>('.Fonctions::formatPrix($value->valeur).')</b></label></td>
                <td><input class="form-control"type="number" name="nbr_'.($nbr+1).'" value="'.$nombre[$nbr].'"></td>
            </tr>';
                $nbr++;
            }

            $page = '<table  class="table table-hover">
                <input type="hidden" name="typeSave" value="updateMonnaie">
                <!--tr>
                    <td><center><label class="control-label" for="date"><b>DEVISE</b></label></center></td>
                    <td><center><label class="control-label" for="date"><b>NOMBRE</b></label></center></td>
                </tr-->            
                '.$rowDevise.'
                <tr>
                    <td><label class="control-label" for=""><b>TOTAL</b></label></td>
                    <td id="totalMonnaieMomo">0 FCFA</td>
                </tr>
            </table>';
        }
        return $page;
    }

}