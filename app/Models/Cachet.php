<?php

namespace App\Models;

use App\Models\Fonctions;
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
            $onclickView = 'onclick="loadContentUpdateBilan(\'cachet\',\''.$value->id.'\');"';
            $onclickUpdate = 'onclick="loadContentUpdateBilan(\'cachet\',\''.$value->id.'\');"';
            $onclickDelete = 'onclick="updateStatutBilan(\'cachet\',\''.$value->id.'\');"';

            $rowBilan = $rowBilan.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.Tlist_cachet::getLibelle($value->type).'</td> <!-- type -->
                <td>'.$value->nombre.'</td> <!-- nombre -->
                <td>'.Fonctions::formatPrix($value->prix_unitaire).'</td> <!-- prix_unitaire -->
                <td>'.Fonctions::formatPrix($nxpu).'</td> <!-- nombre * PU -->
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#viewBilan">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </a>

                        <a class="green" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#updateBilan">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a class="red" href="#" '.$onclickDelete.'  data-toggle="modal" data-target="#deleteBilan">
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
                                    <a href="#" class="tooltip-info" '.$onclickView.' data-rel="tooltip" title="View" data-toggle="modal" data-target="#viewBilan">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-success" '.$onclickUpdate.' data-rel="tooltip" title="Edit" data-toggle="modal" data-target="#updateBilan">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                                

                                <li>
                                    <a href="#" class="tooltip-error" '.$onclickDelete.' data-rel="tooltip" title="Delete" data-toggle="modal" data-target="#deleteBilan">
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

            $total = $total+$nxpu;
            $somqte = $somqte+(int)$value->nombre;
        }

        $total = Fonctions::formatPrix($total);

        return ([$rowBilan,$somqte,$total]);
    }
}
