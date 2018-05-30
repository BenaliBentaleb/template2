<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        //$check = false;

        foreach(Auth::user()->roles as $role) {
            if($role->nom == "Administrateur"){
                return $next($request);
                
            }
        }
        return redirect()->route('home');
       
       
    }
}
