<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    

 /*   $login = Auth::id();
    $perfil = User::select("id_perfil")->where('id', '=', "$login")->value('id_perfil'); 

    
        
            if($perfil == 1){
                return redirect(RouteServiceProvider::HOME);
            } 
            else if ($perfil == 2){
                return redirect(RouteServiceProvider::HOME_PROF);
            } 
            
    protected $redirectTo = RouteServiceProvider::HOME;      
*/ 

   
    
    //RouteServiceProvider::$rota;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user){
        $login = Auth::id();
        $perfil = User::select("id_perfil")->where('id', '=', "$login")->value('id_perfil'); 

        if ($perfil == 2){
            return redirect()->route('prof_agenda');
        }
        else if($perfil == 1){
            return redirect()->route('home');
        }        

    }


}
