<?php

namespace App;

use Faker\Provider\DateTime;
use Carbon\Carbon;
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
        $tz = '+01:00';
        $now = Carbon::now($tz);
        return $now;
    }
    public static function compactForm($sol, array $attribut, array $type)
    {
        /*$line ='Ras';
        if(count($type)==count($attribut))
        {
            for($i=0; $i<count($attribut); $i++)
            {
                if($type[$i]=='hidden')
                {
                    $line =  $line.'<input type="'.$type[$i].'" id="'.$attribut[$i].'" value="'.$sol->$attribut[$i].'" name="'.$attribut[$i].'">';
                }
                $line =  $line.'<div class="form-group"  style="">
                <label class="control-label" for="'.$attribut[$i].'">Fond</label>
                <input type="'.$type[$i].'" name="'.$attribut[$i].'" id="'.$attribut[$i].'" value="'.$sol->$attribut[$i].'" class="form-control" data-error="'.$attribut[$i].' absent" required >
                <div class="help-block with-errors"></div>
            </div>';
            }
        }
        return $line;*/
        return $sol->$attribut[0];
    }
    public static function colActionTable($params=null)
    {
        $onclickView = 'onclick="loadContentModalView('.$params.');"';
        $onclickUpdate = 'onclick="loadContentModalUpdate('.$params.');"';
        $onclickDelete = 'onclick="loadContentModalDelete('.$params.');"';

        $content = '<div class="hidden-sm hidden-xs action-buttons">
                <a class="blue" href="#" '.$onclickView.' data-toggle="modal" data-target="#modalView">
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
    public static function formatNom($str)
    {
        if($str=="M" || $str=="m") return "Masculin";
        elseif($str=="F" || $str=="f") return "Féminin";
        else return "RAS";
    }
    public static function formatStatut($statut)
    {
        if($statut=="1") return "Actif";
        else return "Désactivé";
    }
    public static function updateStatut($request)
    {
        return DB::update("
            UPDATE 
              ".$request['table']."
            SET 
              statut='-1' 
            WHERE 
              id='".$request['id']."';
        ");
    }
    public static function calculAge($dateOfBrith)
    {
        return Carbon::parse($dateOfBrith)->age;
    }
    public static function calculDuree($dateHeur)
    {
        $result = '';
        $tz = '+01:00';
        $now = Carbon::now($tz);
        $nows = explode(' ',$now);
        $nowDates  = $nows[0]; $nowDate  = explode('-',$nowDates); $nowYear = $nowDate[0]; $nowMonth = $nowDate[1]; $nowDay = $nowDate[2];
        $nowHeures = $nows[1]; $nowHeure = explode(':',$nowHeures); $nowHour = $nowHeure[0]; $nowMinute = $nowHeure[1]; $nowSecond = $nowHeure[2];

        $dateHeurs = explode(' ',$dateHeur);
        $dates  = $dateHeurs[0]; $date  = explode('-',$dates); $year = $date[0]; $month = $date[1]; $day = $date[2];
        $heures = $dateHeurs[1]; $heure = explode(':',$heures); $hour = $heure[0]; $minute = $heure[1]; $second = $heure[2];

        $date = Carbon::create($year,$month,$day,$hour,$minute,$second,$tz);
        $result = (Carbon::parse(Carbon::now($tz))->diffInMinutes($date) < 2) ? 'à l\'instant' : $date->diffForHumans($now);
        if(Carbon::parse($now)->diffInDays($date) < 1)
        {
            if(Carbon::parse($now)->diffInMinutes($date) < 2)
            {
                $result = 'à l\'instant';
            }
            else
            {
                $today = ((int)$nowDay - (int)$day);
                if(!$today)
                    $result = 'Aujourd\'hui à '.$heures;
                else
                    $result = 'Hier à '.$heures;
            }
        }
        else
        {
            $result = $date->diffForHumans($now);
        }

        return $result;
    }
}
