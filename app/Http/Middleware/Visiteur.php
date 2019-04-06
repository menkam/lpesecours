<?php

namespace App\Http\Middleware;

use Closure;

class Visiteur
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
        if(\Auth::user()->hasAnyGroupe_user(['ADMIN','PERSO','MEBRE','VSTER'])){
            return $next($request);
        }
        abort(401, 'This action is unauthorized.');
    }
}
