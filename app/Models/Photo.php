<?php

namespace App\Models;

use App\Models\Fonctions;
use App\Models\Tlist_cachet;
use DB;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'id',
        'date',
        'type',
        'nombre',
        'prix_unitaire'
    ];

    protected $hidden = [
    ];

    public static function getAllLine($id = null, $statut=null)
    {
        if(empty($statut)) {
            if (!empty($id))
                return DB::select("SELECT * FROM public.photos WHERE  photos.id = '$id' AND photos.statut = '1';")[0];
            else return DB::select("SELECT * FROM public.photos WHERE  photos.statut = '1' ORDER BY  photos.date ASC;");
        }
        else return DB::select("SELECT * FROM public.photos ORDER BY  photos.date ASC;");
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
            $onclick = 'onclick="loadContentUpdateBilan(\'photo\',\''.$value->id.'\');"';

            $rowBilan = $rowBilan.'<tr>
                <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                <td>'.$value->date.'</td> <!-- date -->
                <td>'.Tlist_photo::getLibelle($value->type).'</td> <!-- type -->
                <td>'.$value->nombre.'</td> <!-- nombre -->
                <td>'.Fonctions::formatPrix($value->prix_unitaire).'</td> <!-- prix_unitaire -->
                <td>'.Fonctions::formatPrix($nxpu).'</td> <!-- nombre * PU -->
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="#" data-toggle="modal" data-target="#viewBilan">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </a>

                        <a class="green" href="#" '.$onclick.' data-toggle="modal" data-target="#updateBilan">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a class="red" href="#" data-toggle="modal" data-target="#deleteBilan">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>
                    
                    
                    <!--div class="hidden-sm hidden-xs btn-group">
                        <button class="btn btn-xs btn-success">
                            <i class="ace-icon fa fa-check bigger-120"></i>
                        </button>
        
                        <button class="btn btn-xs btn-info">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                        </button>
        
                        <button class="btn btn-xs btn-danger">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </button>
        
                        <button class="btn btn-xs btn-warning">
                            <i class="ace-icon fa fa-flag bigger-120"></i>
                        </button>
                    </div-->
                    

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View" data-toggle="modal" data-target="#viewBilan">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-success" '.$onclick.' data-rel="tooltip" title="Edit" data-toggle="modal" data-target="#updateBilan">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                                

                                <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" data-toggle="modal" data-target="#deleteBilan">
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
