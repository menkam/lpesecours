<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //protected $redirectTo = '/home';

    public function redirectTo()
    {

        if(\Auth::user()->hasGroupe_user('ADMIN')){
            session(['menus' => Menu::loadMenus(\Auth::user()->getGroupe_user())]);
            return ('home');
            //return route('admin');
        }

        else if(\Auth::user()->hasGroupe_user('PERSO')){
            session(['menus' => Menu::loadMenus(\Auth::user()->getGroupe_user())]);
            return ('home');
            //return route('enseignant');
        }

        else if(\Auth::user()->hasGroupe_user('MEBRE')){
            session(['menus' => Menu::loadMenus(\Auth::user()->getGroupe_user())]);
            return ('home');
            //return route('etudiant');
        }

        else if(\Auth::user()->hasGroupe_user('VSTER')){
            session(['menus' => Menu::loadMenus(\Auth::user()->getGroupe_user())]);
            return ('galerie');
            //return route('etudiant');
        }
        else if(\Auth::user()->hasGroupe_user('BLOQU')){
            session(['menus' => Menu::loadMenus(\Auth::user()->getGroupe_user())]);
            return ('bloquer');
            //return route('etudiant');
        }
        else
        {
            return route('home');
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //session(['menus' => Menu::loadMenus()]);
    }
}
