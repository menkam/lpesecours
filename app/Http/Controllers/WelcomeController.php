<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use DB;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galerie = Galerie_images_accueil::loadGalerie();

        return view('welcome', compact('galerie'));
        //dd($galerie);
        //return response()->json($object);
    }
}
