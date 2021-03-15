<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
            $login = Auth::id();   
            $perfil = User::select("id_perfil")->where('id', '=', "$login")->value('id_perfil'); 
        
            
                if (Auth::guard($guard)->check()) {
                    if($perfil == 1){
                        return redirect(RouteServiceProvider::HOME);
                    } 
                    else if ($perfil == 2){
                        return redirect(RouteServiceProvider::HOME_PROF);
                    } 
                    
                }
        
                return $next($request);            

                    
    }
}
