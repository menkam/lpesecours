<?php

namespace App;

use App\Models\User;
use App\Models\Menu;

trait FonctionAuth
{
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
            //return route('home');
            abort(401, 'This action is unauthorized.');
        }

    }
}
