<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use DB;

class ConceptionContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         ** gérération galerie_accueilSeeder
         **/

        $content = '';
        $nbr = 1;
        /*
        $galeri = Galerie_images_accueil::all();
        foreach ($galeri as $value){

          /*$content = $content.'
            /////////'.$nbr.'//////////<br>
            $object = new Galerie_images_accueil();<br>
            $object->libelle = \''.$value->libelle.'\';<br>
            $object->info = \''.$value->info.'\';<br>
            $object->position = \''.$value->position.'\';<br>
            $idLastGalerie = $object->save();<br><br>

            $object = new Operation();<br>
            $object->type_operation = $typeOperation[\'id\'];<br>
            $idLastOperation = $object->save();<br><br>

            $object = new Ope_user_gale();<br>
            $object->id_operation = $idLastOperation;<br>
            $object->id_user = $user[\'id\'];<br>
            $object->id_galerie = $idLastGalerie;<br>
            $object->save();<br>
            <br>
          ';
          $nbr++;
        }
        */

        $route = "";
        $fileView ="";
        $fileController = "";
        $chemin = "fichierGenerer/";

        if(@mkdir("fichierGenerer"))
            echo "-création du dossier fichierGenerer<br>";
        if(@mkdir($chemin."views"))
            echo "-création du dossier views <br>";
        if(@mkdir($chemin."models"))
            echo "-création du dossier models <br>";
        if(@mkdir($chemin."Controleurs"))
            echo "-création du dossier controllers <br>";
        if(@mkdir($chemin."Routes"))
            echo "-création du dossier routes <br>";

        foreach (Menu::getAllMenuGener() as $value)
        {
            $fichier_route = fopen($chemin."Routes/web.php", "w+");
            echo "-création du fichier php".$chemin."Routes/web.php <br>";
            $fichier_view = fopen($chemin."views/".$value->fichierView.".blade.php", "w+");
            echo "-création du fichier php".$chemin."views".$value->fichierView.".blade.php <br>";

            $route = 'Route::get(\''.$value->route.'\', \''.$value->controller.'\')->name(\''.$value->libelle.'\');<br>';
            fwrite($fichier_route, $route);
            echo "-création du contenu du fichier ".$chemin."Routes/web.php <br>";

            $fileView = 'touch resources/views/generer/'.$value->libelle.'.blade.php<br>';
            fwrite($fichier_view, $fileView);
            echo "-création du contenu du fichier ".$chemin."views/".$value->fichierView.".blade.php <br>";

            //$fileController = $fileController.'php artisan make:controller generer\\\\'.$value->controller.' -r<br>';
        }


        //echo "Routes<br>$route<br>Views<br>$fileView<br>Controller<br>$fileController";





       /* fwrite($fichier_model, $contenu_model);
        echo "-création du contenu du fichier $chemin_model$dossier.php <br>";
        fwrite($fichier_view, $contenu_view);
        echo "-création du contenu du fichier $chemin_view$dossier.php <br>";
        fwrite($fichier_controller, $contenu_controller);
        echo "-création du contenu du fichier $chemin_controller$dossier.php <hr><br>";*/


    }


}
