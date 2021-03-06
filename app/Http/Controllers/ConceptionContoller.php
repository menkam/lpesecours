<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Message_user;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Message_user_;
use App\Models\Monnaie;
use App\Models\Compte_perso;
use App\Models\Tlist_groupe_user;
use App\Models\Photo;
use App\Models\Mobile_money;
use App\Models\Tlist_groupe_user_user;
use App\Fonctions;
use App\FichiersCSV;
use Validator;
use DB;



class ConceptionContoller extends Controller
{

public static function validationProfil(Request $request) {
    return Validator::make($request->all(), ['photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048']);
}

public function uploads(Request $request) {

    $validator = self::validationProfil($request);
    $result = "ras";
    $errors = '';
    if($validator->passes()) {
        $file = $request->file('photo');
        $name = 'daengweb-' . \Carbon\Carbon::now()->format('Y-m-dH:i:s') . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $name);
        /*$image = $request->file('photo');
        $images = 'daengweb-' . \Carbon\Carbon::now()->format('Y-m-dH:i:s') . '.' . $image->getClientOriginalExtension();
        \Image::make($image)->resize(300, 200)->save(storage_path('app\uploads'.$images));
        //$path = $file->storeAs('uploads', $name, 's3');*/
        
        $result = $path;
    }else{
        $errors = $validator->errors()->all();
        //dd($errors);
    }
   

    return view("applications/Maintenance", compact(['result','errors']));
    //dd($sol);

}

    public function index()
    {

        $result="ras";

        return view("applications/Maintenance", compact('result'));

    }

    public function test(Request $request)
    {
        return view("applications/test");
    }

    public function testpost(Request $request)
    {
        $sol = "le parametre est ".$request->param;
        //dd($sol);
        echo $sol;
    }

    public function initApp()
    {
        $titre = '';
        $breadcrumb1 = 'Home';
        $breadcrumb2 = '';
        $breadcrumb3 = '';

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
        if(@mkdir($chemin."controlleurs"))
            echo "-création du dossier controllers <br>";
        if(@mkdir($chemin."Routes"))
            echo "-création du dossier routes <br>";

        foreach (Menu::getMenuForController() as $value0)
        {
            $fichier_controller = fopen($chemin."controlleurs/".$value0->fichiercontroller.".php", "w+");
            echo "-création du fichier php : ".$chemin."controlleurs".$value0->fichiercontroller.".php <br>";


            $idmenu = $value0->id;
            $classeControlleur = $value0->fichiercontroller;
            $classeview = $value0->fichierview;
            $viewReturn = '';

            if(Menu::isSMenu($idmenu)){
                foreach (Menu::getSMenu($idmenu) as $value1){
                    $idsmenu = $value1->id;

                    if(Menu::isSMenu($idsmenu)){
                        foreach (Menu::getSMenu($idsmenu) as $value2){
                            $controlleurs = explode("@", $value2->controller);
                            $methode = $controlleurs[1];
                            $viewReturn = $viewReturn.'
    public function '.$methode.'(){ return view("'.$value2->fichierview.'"); }
    ';
                        }
                    }else{
                        $controlleurs = explode("@", $value1->controller);
                        $methode = $controlleurs[1];
                        $viewReturn = $viewReturn.'
    public function '.$methode.'(){ return view("'.$value1->fichierview.'");}
    ';
                    }
                }
            }else{
                $viewReturn = $viewReturn.'
    public function index(){ return view("'.$value0->fichierview.'"); }
    ';
            }

            $pages =
                '<?php

namespace App\Http\Controllers;

use App\Models\\'.$classeview.';
use Illuminate\Http\Request;


class '.$classeControlleur.' extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    '.$viewReturn.'

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\\'.$classeview.'  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show('.$classeview.' $objet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\\'.$classeview.'  $objet
     * @return \Illuminate\Http\Response
     */
    public function edit('.$classeview.' $objet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\\'.$classeview.'  $objet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, '.$classeview.' $objet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\\'.$classeview.'  $objet
     * @return \Illuminate\Http\Response
     */
    public function destroy('.$classeview.' $objet)
    {
        //
    }
    
}';
            fwrite($fichier_controller, $pages);
            echo "-création du contenu du fichier ".$chemin."controlleurs/".$value0->fichiercontroller.".blade.php <br>";
        }


        //////////////////////////////////

        foreach (Menu::getAllMenuGener() as $value)
        {
            $fichier_route = fopen($chemin."Routes/web.php", "a+");
            echo "-création du fichier php".$chemin."Routes/web.php <br>";
            $fichier_view = fopen($chemin."views/".$value->fichierview.".blade.php", "w+");
            echo "-création du fichier php".$chemin."views".$value->fichierview.".blade.php <br>";

            $froute = 'Route::get(\''.$value->route.'\', \''.$value->controller.'\')->name(\''.$value->libelle.'\');';
            fwrite($fichier_route, $froute."\n");
            echo "-création du contenu du fichier ".$chemin."Routes/web.php <br>";

            $lien = explode("\\", $value->lien);
            $nbrlien = count($lien);
            $route = $value->route;
            $pageheader = $value->libelle;


            if($nbrlien==1){
                $breadcrumb2 = '<li class="active"><a href="'.$route.'">'.$lien[0].'</a></li>';
            }elseif ($nbrlien==2){
                $breadcrumb2 = '<li><a href="#">'.$lien[0].'</a></li>';
                $breadcrumb3 = '<li class="active"><a href="'.$route.'">'.$lien[1].'</a></li>';
            }elseif ($nbrlien==3){
                $breadcrumb1 = $lien[0];
                $breadcrumb2 = '<li><a href="#">'.$lien[1].'</a></li>';
                $breadcrumb3 = '<li class="active"><a href="'.$route.'">'.$lien[2].'</a></li>';
            }

            $pages = '@extends("layouts.template")
@section("title")
<title>'.$titre.'</title>
<meta name="description" content=" with some customizations as described in docs" />
@endsection

@section("style")

@endsection

@section("breadcrumb")
<ul class="breadcrumb">
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/">'.$breadcrumb1.'</a>
    </li>
    '.$breadcrumb2.'
    '.$breadcrumb3.'
</ul>
@endsection

@section("page-header")
<h1>
    '.$pageheader.'
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content")
<div class="">Pages '.$value->fichierview.'.php en cours de developpement...</div>
@endsection

@section("scripts")

@endsection

@section("scripts2")

@endsection';

            fwrite($fichier_view, $pages);
            echo "-création du contenu du fichier ".$chemin."views/".$value->fichierview.".blade.php <br>";
        }
    }
}
