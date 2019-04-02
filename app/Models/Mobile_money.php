<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
        $TotalEC2=0;
        $MargeEC2=0;
        $DiffCom=0;
        $Supplement=0;

        foreach (Mobile_money::getAllLine() as $value)
        {
            $TotalEC2 = (integer)$value->espece + (integer)$value->compte_momo + (integer)$value->compte2;

            $rowBilanMoMo = $rowBilanMoMo.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.$value->fond.'</td> <!-- fond -->
                <td>'.$value->pret.'</td> <!-- prêt -->
                <td>'.$value->espece.'</td> <!-- espèces -->
                <td>'.$value->compte_momo.'</td> <!-- compteMoMo -->
                <td>'.$value->compte2.'</td> <!-- Compte2 -->
                <td>'.$value->frais_transfert.'</td> <!-- frais transfert -->
                <td>'.$value->commission.'</td> <!-- commission -->
                <td>'.$TotalEC2.'</td> <!-- TotalEC2 -->
                <td>'.$MargeEC2.'</td> <!-- MargeEC2 -->
                <td>'.$DiffCom.'</td> <!-- DiffCom -->
                <td>'.$Supplement.'</td> <!-- Supplement -->
                <td><span class="label label-sm label-success">'.$TotalEC2.'</span></td> <!-- statut -->
                <!--td><span class="label label-sm label-warning">Mauvais</span></td--> <!-- statut -->
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
        }
        return $rowBilanMoMo;
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
