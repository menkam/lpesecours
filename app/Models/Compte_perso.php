<?php

namespace App\Models;
use DB;
use App\Fonctions;
use Validator;
use App\FichiersCSV;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class compte_perso extends Model
{
    protected $guarded = array();

    protected $groupeuser;

    protected $fillable = [
        'id',
        'date',
        'type',
        'user',
        'somme',
        'commentaire',
        'statut'
    ];

    protected $casts = [

    ];

    private static function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer|min:1',
            'user' => 'required|integer|min:1',
            'somme' => 'required|integer',
            'commentaire' => 'required|string'
        ]);
    }

    public static function createCompte_perso(Request $request)
    {
        $request['user'] = Fonctions::getIdUser();
        $validator = self::validator($request);
        if ($validator->passes())
        {
            $save = Compte_perso::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'user' => $request['user'],
                'somme' => $request['somme'],
                'commentaire' => $request['commentaire']
            ]);
            if($save)
                return response()->json(['success'=>'Added Date: '.$request['date'].' -> success.']);
            else return response()->json(['error'=>"Error"]);
        }
        else return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function createGlobalUser($arrayss)
    {
        $sol = "<h1><u>Debut de la mise à jours Compte_perso</u></h1><br>";
        $arrays = explode(Fonctions::delimiteurRows(), $arrayss);
        //dd(count($array));
        for($i=0; $i<count($arrays); $i++)
        {
            $array = explode(";", $arrays[$i]);
            if(count($array)==8)
            {
                if(!self::isExcist($array[0],$array[1]))
                {
                    $request = new Request([
                        'date' => $array[0],
                        'type' => $array[1],
                        'user' => $array[2],
                        'somme' => $array[3],
                        'commentaire' => $array[4],
                        'statut' => $array[4],
                        'created_at' => $array[6],
                        'updated_at' => $array[7]
                    ]);
                    $sol = $sol.self::createCompte_perso($request).'<br>';
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
        $sol = $sol."<h1><u>Fin de la mise à jours Utilisateur</u></h1><br>";
        return $sol;
    }

    public static function saveCompte_perso()
    {
        $lignes = array();
        $photos = self::getAllLine();
        $lignes[] = array('date','type','user','somme','commentaire','statut','created_at','updated_at');
        foreach ($photos as $val)
        {
            $lignes[] = array(
                $val->date,
                $val->type,
                $val->user,
                $val->somme,
                $val->commentaire,
                $val->statut,
                $val->created_at,
                $val->updated_at,
            );
        }
        //dd($lignes);
        return FichiersCSV::ecriture("compte_perso", $lignes);
    }
    public static function isExcist($date,$type)
    {
        $idUser = Fonctions::getIdUser();
        return DB::select("SELECT COUNT(date) FROM compte_persos WHERE date='$date' AND \"user\"='$idUser' AND type = '$type';")[0]->count;
    }

    public static function getRow($date,$type)
    {
        $idUser = Fonctions::getIdUser();
        return DB::select("SELECT somme, commentaire FROM compte_persos WHERE date='$date' AND \"user\"='$idUser' AND type = '$type';")[0];
    }

    public static function updateCompte_perso($request)
    {
        $date = Fonctions::getCurentDate();
        $idUser = Fonctions::getIdUser();
        $request['user'] = $idUser;
        $validator = self::validator($request);
        if ($validator->passes())
        {
            $update = DB::update("
            UPDATE 
              compte_persos
            SET 
              somme='".$request['somme']."', 
              commentaire='".$request['commentaire']."', 
              updated_at='$date'
            WHERE 
               date='".$request['date']."' AND \"user\"='".$request['user']."' AND type = '".$request['type']."';
        ");

            if($update) return response()->json(['success'=>'Update Date: '.$request['date'].' -> success.']);
            else return response()->json(['error'=>"error"]);
        }
        else return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function getAllLine($id = null, $statut=null, $type=null)
    {
        $idUser = Fonctions::getIdUser();
        if(!empty($statut) && !empty($id) && !empty($type)) return DB::select("SELECT * FROM compte_persos WHERE id = '$id' AND statut = '$statut' AND type = '$type' AND \"user\" = '$idUser' ORDER BY \"date\" DESC;");
        elseif(!empty($statut)) return DB::select("SELECT * FROM public.compte_persos WHERE statut = '$statut'  AND \"user\" = '$idUser' ORDER BY \"date\" DESC;");
        elseif(!empty($id)) return DB::select("SELECT * FROM public.compte_persos WHERE  id = '$id' AND \"user\" = '$idUser' ORDER BY \"date\" DESC;");
        elseif(!empty($type)) return DB::select("SELECT * FROM public.compte_persos WHERE  \"user\" = '$idUser'  AND type IN (SELECT id FROM  Tlist_compte_persos WHERE code = '$type') ORDER BY \"date\" DESC;");
        else return DB::select("SELECT * FROM public.compte_persos  ORDER BY \"date\" DESC;");
    }

    public static function getSomCompte($codeType)
    {
        $libelle = "";
        $somme = "0";
        $idUser = Fonctions::getIdUser();
        $sol = DB::select("SELECT SUM(somme) as somme FROM compte_persos WHERE statut = '1' AND \"user\" = '$idUser' AND type IN (SELECT id FROM  Tlist_compte_persos WHERE code = '$codeType');");
        if(!empty($sol))
        {
            $libelle = Tlist_compte_perso::getLibelle($codeType);
            if(!empty($libelle))
            {
                $libelle = $libelle[0]->libelle;
                $somme = $sol[0]->somme;
            }
        }
        return ([$libelle,$somme]);
    }

    public static function getLastCompte($codeType=null)
    {
        $idUser = Fonctions::getIdUser();
        $compte = "0";
        if(!empty($codeType))
            $sol = DB::select("
              SELECT 
                date, type, somme 
              FROM 
                compte_persos 
              WHERE 
                date IN (
                  SELECT MAX(date) 
                  FROM compte_persos 
                  WHERE 
                    \"user\" = '$idUser' AND 
                    type IN(
                      SELECT id 
                      FROM Tlist_compte_persos 
                      WHERE code = '$codeType'
                    )
                ) AND
                \"user\" = '$idUser' AND
                type IN(
                  SELECT id 
                  FROM Tlist_compte_persos 
                  WHERE code = '$codeType'
                );
             ");
        else
            $sol = DB::select("SELECT date, type, somme FROM compte_persos WHERE date IN(SELECT MAX(date) FROM compte_persos WHERE statut = '1' AND \"user\" = '$idUser');");
        if(!empty($sol))
            $compte = $sol[0]->somme;
        return $compte;
    }

    public static function bilanPret()
    {
        return self::bilan("PRT");
    }

    public static function bilanJournalier()
    {
        return self::bilan("JNL");
    }

    public static function bilanEpargne()
    {
        return self::bilan("EPG");
    }
    public static function bilan($type)
    {
        $row = "";
        $result = self::getAllLine(null,null,$type);
        foreach ($result as $value)
        {
            $row = $row."<tr><td>".$value->date."</td><td>".Fonctions::formatPrix($value->somme)."</td><td>".$value->commentaire."</td></tr>";
        }
        return $row;
    }
}

