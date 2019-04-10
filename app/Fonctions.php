<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Fonctions extends Model
{
    public static function formatPrix($prix)
    {
        $signe = "";
        if((int)$prix<0){
            $signe = "-";
            $prix = -(int)$prix;
        }
        $prix = (string)$prix;
        $taille = strlen($prix);
        $newPrix = '';
        $delimiteur = ".";


        for($i=0; $i<$taille; $i++){
            if((($taille>9 && $taille-($i+1)==9)) || ($taille>6 && ($taille-($i+1)==6)) || ($taille>3 && ($taille-($i+1)==3)))
                $newPrix = $newPrix.$prix[$i].$delimiteur;
            else
                $newPrix = $newPrix.$prix[$i];
        }
        return $signe.$newPrix;
    }
    public static function getCurentDate()
    {
        $dateCourante = "";
        $date = getDate();
        if((int)$date["mon"] < 10 && (int)$date["mday"] < 10){
            $dateCourante = $date["year"]."-0".$date["mon"]."-0".$date["mday"];
        }
        if((int)$date["mon"] < 10 && (int)$date["mday"] >= 10){
            $dateCourante = $date["year"]."-0".$date["mon"]."-".$date["mday"];
        }
        if((int)$date["mon"] >= 10 && (int)$date["mday"] < 10){
            $dateCourante = $date["year"]."-".$date["mon"]."-0".$date["mday"];
        }
        if((int)$date["mon"] >= 10 && (int)$date["mday"] >= 10){
            $dateCourante = $date["year"]."-".$date["mon"]."-".$date["mday"];
        }
        return $dateCourante;
    }

    public static function colActionTable($view=null,$update=null,$delete=null)
    {
        $onclickUpdate = 'onclick="loadContentUpdateBilan();"';
        $onclickView = 'onclick="loadContentUpdateBilan();"';
        $onclickDelete = 'onclick="updateStatutBilan();"';

        $content = '<div class="hidden-sm hidden-xs action-buttons">
                <a class="blue" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#modalView">
                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                </a>
    
                <a class="green" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#modalUpdate">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
    
                <a class="red" href="#" '.$onclickDelete.'  data-toggle="modal" data-target="#modalDelete">
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
                            <a href="#" class="tooltip-info" '.$onclickView.' data-rel="tooltip" title="View" data-toggle="modal" data-target="#modalView">
                                <span class="blue">
                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                </span>
                            </a>
                        </li>
    
                        <li>
                            <a href="#" class="tooltip-success" '.$onclickUpdate.' data-rel="tooltip" title="Edit" data-toggle="modal" data-target="#modalUpdate">
                                <span class="green">
                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                </span>
                            </a>
                        </li>
                        
    
                        <li>
                            <a href="#" class="tooltip-error" '.$onclickDelete.' data-rel="tooltip" title="Delete" data-toggle="modal" data-target="#modalDelete">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>';
        return $content;
    }

}
