<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Fonctions;
use DB;

class Mobile_money extends Model
{
    protected $guarded = array();

    protected $fillable = [
        'date',
        'fond',
        'pret',
        'espece',
        'compte_momo',
        'compte2',
        'frais_transfert',
        'statut',
        'commission'
    ];

    protected $hidden = [
    ];

    protected $casts = [

    ];

    public static function getAllLine($statut= null, $id=null, $last=null)
    {
        if(!empty($statut))
        {
            if(!empty($id))
                return DB::select("SELECT * FROM public.mobile_moneys WHERE mobile_moneys.statut='$statut' AND  mobile_moneys.id='$id';")[0];
            elseif(!empty($last))
                return DB::select("
                        SELECT 
                          *
                        FROM 
                          public.mobile_moneys
                        WHERE 
                            mobile_moneys.date in(
                            SELECT 
                              MAX(mobile_moneys.date)
                            FROM 
                              public.mobile_moneys
                            WHERE
                              mobile_moneys.statut='$statut');
                    ")[0];
            else
                return DB::select("SELECT * FROM public.mobile_moneys WHERE mobile_moneys.statut='$statut' ORDER BY  mobile_moneys.date ASC;");
        }
        else
        {
            return DB::select("SELECT * FROM public.mobile_moneys ORDER BY  mobile_moneys.date ASC;");
        }
    }

    /**
     * somme des commission
     */
    public static function somCommission()
    {
        return DB::select("
            SELECT 
              SUM(mobile_moneys.pret)
            FROM 
              public.mobile_moneys
            WHERE 
              mobile_moneys.statut='1';
        ")[0];
    }

    /**
     * show bilan
     */
    public static function showBilan()
    {
        $rowBilanMoMo = '';
        $msgStatut = '';
        $totalEC2=array();
        $commission=array();

        $nbr=1;
        $somPret=0;
        $somFrais=0;
        $maxComm=0;
        $somMEC2=0;
        $maxSup=0;
        $lastFond=0;
        $lastStatut='';
        $lastTotal=0;

        $totalEC2[0] = 200000;
        $commission[0] = 23753;

        foreach (Mobile_money::getAllLine('1') as $value)
        {
            $totalEC2[$nbr] = (integer)$value->espece + (integer)$value->compte_momo + (integer)$value->compte2;
            $commission[$nbr] = (integer)$value->commission;


            $margeEC2 =  ($totalEC2[$nbr] +(integer)$value->frais_transfert - ($totalEC2[$nbr-1] + (integer)$value->pret));
            if($margeEC2<0) $valMargerEC2 = '<td><span class="label label-sm label-warning">'.Fonctions::formatPrix($margeEC2).'</span></td>';
            elseif($margeEC2>=0) $valMargerEC2 = '<td><span class="label label-sm label-success">'.Fonctions::formatPrix($margeEC2).'</span></td>';
            $diffCom = (integer)$value->commission - $commission[$nbr-1];
            $Supplement = ($totalEC2[$nbr]-((integer)$value->fond));
            if((((integer)$value->fond+(integer)$value->pret))<=$totalEC2[$nbr]) $msgStatut = '<td><span class="label label-sm label-success">Bon</span></td>';
            elseif((((integer)$value->fond+(integer)$value->pret))>$totalEC2[$nbr]) $msgStatut = '<td><span class="label label-sm label-success">Mauvais</span></td>';

            $somPret = $somPret + (integer)$value->pret;
            $somFrais = $somFrais + (integer)$value->frais_transfert;
            $maxComm = (integer)$value->commission;
            $somMEC2 = $somMEC2 + $margeEC2;
            $maxSup = $Supplement;
            $lastFond = (integer)$value->fond;
            $lastStatut = $msgStatut;
            $lastTotal = $totalEC2[$nbr];

            $action = Fonctions::colActionTable();
            /*$onclickView = 'onclick="loadContentUpdateBilan(\'momo\',\''.$value->id.'\');"';
            $onclickUpdate = 'onclick="loadContentUpdateBilan(\'momo\',\''.$value->id.'\');"';
            $onclickDelete = 'onclick="updateStatutBilan(\'momo\',\''.$value->id.'\');"';*/


            $rowBilanMoMo = $rowBilanMoMo.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.Fonctions::formatPrix($value->fond).'</td> <!-- fond -->
                <td>'.Fonctions::formatPrix($value->pret).'</td> <!-- prêt -->
                <td>'.Fonctions::formatPrix($value->espece).'</td> <!-- espèces -->
                <td>'.Fonctions::formatPrix($value->compte_momo).'</td> <!-- compteMoMo -->
                <td>'.Fonctions::formatPrix($value->compte2).'</td> <!-- Compte2 -->
                <td>'.Fonctions::formatPrix($value->frais_transfert).'</td> <!-- frais transfert -->
                <td>'.Fonctions::formatPrix($value->commission).'</td> <!-- commission -->
                <td>'.Fonctions::formatPrix($totalEC2[$nbr]).'</td> <!-- TotalEC2 -->
                '.$valMargerEC2.'<!-- MargeEC2 -->
                <td>'.Fonctions::formatPrix($diffCom).'</td> <!-- DiffCom -->
                <td>'.Fonctions::formatPrix($Supplement).'</td> <!-- Supplement -->
                '.$msgStatut.' <!-- statut -->                
                <td>'.$action.'<\td>
            </tr>';
            $nbr++;
        }
        $somPret = Fonctions::formatPrix($somPret);
        $somFrais = Fonctions::formatPrix($somFrais);
        $maxComm = Fonctions::formatPrix($maxComm);
        $somMEC2 = Fonctions::formatPrix($somMEC2);
        $maxSup = Fonctions::formatPrix($maxSup);
        $lastFond = Fonctions::formatPrix($lastFond);
        $lastStatut = Fonctions::formatPrix($lastStatut);
        $lastTotal = Fonctions::formatPrix($lastTotal);
        return ([$rowBilanMoMo,$somPret,$somFrais,$maxComm,$somMEC2,$maxSup,$lastFond,$lastStatut,$lastTotal]);
    }

    public static  function seeder(){
        $content = '';
        foreach (Mobile_money::getAllLine('1') as $value){

            $content = $content.'
                $object = new Mobile_money();<br>
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

        return $content;
    }

    public static function infoUtile()
    {
        $info1 = Mobile_money::getAllLine('1',null,'ok');
        $info2 = Mobile_money::somCommission();
        //dd($info1);

        return ([
            $info1->date,
            Fonctions::formatPrix($info1->fond),
            Fonctions::formatPrix($info2->sum),
            Fonctions::formatPrix($info1->commission),
            Fonctions::formatPrix((int)$info1->fond+(int)$info2->sum),
            $info1->fond
        ]);

    }

}
