<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Galerie_images_accueil;
use App\Models\Menu;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galerie = '';
        $galerie = Galerie_images_accueil::loadGalerie();

        return view('home', compact('galerie'));

        //dd($galerie);
        //return response()->json($object);

    }
}
