<?php

namespace App;

use App\Models\User;
use App\Models\Menu;

trait FonctionAuth
{
    public function redirectTo()
    {

        if(\Auth::user()->hasGroupe_user('ADMIN')){
            return ('home');
            //return route('admin');
        }

        else if(\Auth::user()->hasGroupe_user('PERSO')){
            return ('home');
            //return route('enseignant');
        }

        else if(\Auth::user()->hasGroupe_user('MEBRE')){
            return ('home');
            //return route('etudiant');
        }

        else if(\Auth::user()->hasGroupe_user('VSTER')){
            return ('galerie');
            //return route('etudiant');
        }
        else if(\Auth::user()->hasGroupe_user('BLOQU')){
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
