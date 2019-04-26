<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    public static function run($file,$allowed,$filename,$chemine,$maxsize=1*1024*1024)
    {
        // Vérifie si le fichier a été uploadé sans erreur.
        if(isset($file) && $file["error"] == 0){

            $filetype = $file["type"];
            $filesize = $file["size"];
            //dd($filesize);

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(array_key_exists($ext, $allowed)){
                // Vérifie la taille du fichier - 5Mo maximum
                if($filesize <= $maxsize)
                {
                    // Vérifie le type MIME du fichier
                    if(in_array($filetype, $allowed)){
                        // Vérifie si le fichier existe avant de le télécharger.
                        if(file_exists($chemine)){
                            $result = $result = array("error"=>"existe déjà.");
                        } else{
                            move_uploaded_file($file["tmp_name"], $chemine);
                            $result = array("success"=>"Votre fichier a été téléchargé avec succès.");
                        }
                    } else{
                        $result = array("error"=>"Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
                    }
                }
                else
                {
                    $result = array("error"=>"La taille du fichier est supérieure à la limite autorisée (".($maxsize/1024)." Ko).");
                }
            }
            else
            {
                $result = array("error"=>"Veuillez sélectionner un format de fichier valide.");
            }
        } else{
            $result = array("error"=>$file["error"]);
        }
        return response()->json($result);
    }
}