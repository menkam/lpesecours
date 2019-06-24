<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Models\Mobile_money;


class LectureFichiersCSV extends Model
{
    public static function run($fichierCSV)
    {
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
                $result = $result.$header[0].":";
        }
        return $result;

        //dd();
    }
}
