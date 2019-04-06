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
}
