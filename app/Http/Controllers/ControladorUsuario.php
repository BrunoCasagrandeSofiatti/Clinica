<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Perfis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControladorUsuario extends Controller
{
    public function indexView()
    {
     return view('layout/usuarios');
    }

    public function sair(){
       Auth::logout();
      return redirect()->route('login');
    }
    
    public function usuariologin()
    {
        if (Auth::user()){
            $login = Auth::user();             
        }                
        return response($login);        
    }

    public function index()
    {
       $registros = User::select("users.id", "users.name", "users.email", "perfis.name AS perfil" )
       ->join('perfis', 'perfis.id', '=', 'users.id_perfil')->paginate(5);

      return $registros->toJson();
    }

    public function store(Request $request)
    {
        $regras = [
            'nome'=> 'required|min:2|max:25',
            'email'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required'
        ];
        $mensagens =[
            'nome.required' => 'É necessario informar um nome',
            'nome.min' => 'Para o campo Nome necessário pelo menos 2 letras',
            'nome.max' => 'O tamanho máximo para campo Nome não pode ultrapasar 25 letras',
            'email.required' => 'É necessario informar um e-mail',
            'password.required' => 'É necessario informar a senha',
            'password_confirmation.required' => 'É necessario novamente a senha',
        ];
        $request->validate($regras, $mensagens);
    
        $indmed = null;    
        $indate = null;      
        $inpass = $request->input('password'); 
        $inpasc = $request->input('password_confirmation');
        $perfil = $request->input('id_perfil');
        $id_ind = $request->input('id_individuo');
        
        if ($inpass == $inpasc){        

                if ($perfil == 2){                   
                    $indmed = $id_ind;
                }

                else if ($perfil == 1){            
                    $indate = $id_ind;
                }
            
                $password = Hash::make($inpass);

                $user = new User();
                $user->name = $request->input('nome');
                $user->email = $request->input('email');
                $user->password = $password;
                $user->id_perfil = $request->input('id_perfil');
                $user->id_medico = $indmed;
                $user->id_atendente = $indate;
            
                $user->save();

                return json_encode($user);
        }
        return response('As Senhas informadas são diferentes',404);
    }

    public function show($id)
    {
        $medi = User::find($id);
        if (asset($medi)){
            return json_encode($medi);
        }
        return response('Medico não encontrado',404);
    }


    public function update(Request $request, $id)
    {
        $medi = User::find($id);
        if (asset($medi)){
            $medi->nome = $request->input('nome');


            $medi->save();
            return json_encode($medi);
        }
        return response('Medico não encontrado',404);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if(isset($user)){
            $user->delete();
            return response('OK',200);
        } 
        return response('Usuário não encontrado',404);
        
    }

    public function indexJson()
    {
        $medi = User::all();
        return json_decode($medi);
    }
}