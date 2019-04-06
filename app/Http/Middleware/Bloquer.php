<?php

namespace App\Http\Middleware;

use Closure;

class Bloquer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->hasGroupe_user('BLOQU')){
            return $next($request);
        }
        return redirect('home');
    }
}
