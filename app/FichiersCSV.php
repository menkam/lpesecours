<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Fonctions;


class FichiersCSV extends Model
{
    public static function lecture($fichierCSV)
    {
        $delimiteur = Fonctions::delimiteurRows();
        //lire le fichier csv
        $csv = Reader::createFromPath(storage_path(Fonctions::cheminCSV($fichierCSV)));
        $nbr = $csv->count();
        //$csv->setDelimiter(";");
         $result = "";

        for($i=1; $i<$nbr; $i++)
        {
            $header = (new Statement())->process($csv->setHeaderOffset($i))->getHeader();
            if($i==($nbr-1))
                $result = $result.$header[0];
            else
                $result = $result.$header[0].$delimiteur;
        }
        return $result;

        //dd();
    }

    public static function ecriture($nomFichierCSV, array $lignes)
    {
        $resul = "=> Debut de creation de la sauvegade \"".$nomFichierCSV."\"";
        $date = '';//Fonctions::getCurentDateChaine().'_';
        //dd($date);
        $chemin = storage_path(Fonctions::cheminCSV($date.$nomFichierCSV));
        $delimiteur = ';';

        $fichier_csv = fopen($chemin, 'w+');
        //fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));
        $resul = $resul."<br>ecriture en cours.....";
        foreach ($lignes as $ligne)
        {
            fputcsv($fichier_csv, $ligne, $delimiteur);
        }
        fclose($fichier_csv);

        $resul = $resul."<br>fichier sauvegarder avec succès.<br>";
        return $resul;
    }
}
