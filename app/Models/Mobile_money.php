<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Fonctions;

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

        foreach (Mobile_money::getAllLine() as $value)
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
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="#">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </a>

                        <a class="green" href="#">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a class="red" href="#">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
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
        foreach (Mobile_money::getAllLine() as $value){

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

}
