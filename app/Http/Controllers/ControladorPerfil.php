<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Perfis;

class ControladorPerfil extends Controller
{
    public function indexView()
    {
     //   $conv = Convenios::paginate(2);
     //   return view('layout/convenios', compact('conv'));
     return view('layout/perfis');
    }

    public function index()
    {
        return Perfis::paginate(5);
    }

    public function indexbox()
    {
         $perf = Perfis::all();
         return $perf->toJson();
    }

    public function store(Request $request)
    {
        $regras = [
            'name'=> 'required|min:2|max:15|unique:perfis'        
        ];

        $mensagens =[
            'name.min' => 'Para o campo Nome Perfil é necessário informar pelo menos 2 letras',
            'name.max' => 'O tamanho máximo para campo Nome Perfil não pode ultrapasar 15 letras',
            'name.unique' => 'Já existe um Perfil cadastrado com este nome',            
            'name.required' => 'É necessario informar um Perfil'
        ];
        $request->validate($regras, $mensagens);

        
        $perf = new Perfis();
        $perf->name = $request->input('name');
        $perf->save();
        return json_encode($perf);
    }

    public function show($id)
    {
        $perf = Perfis::find($id);
        if (asset($perf)){
            return json_encode($perf);
        }
        return response('Perfil não encontrado',404);
    }

   /* public function edit($id)
    {
        $conv = Convenios::find($id);
        if (asset($conv)){
            return view('\layou\editarconvenio',compact('conv'));
        }
        return redirect('convenios');
    }*/

    public function update(Request $request, $id)
    {
        $perf = Perfis::find($id);
        if (asset($perf)){
            $perf->name = $request->input('name');
            $perf->save();
            return json_encode($perf);
        }
        return response('Perfil não encontrado',404);
    }

    public function destroy($id)
    {
        $perf = Perfis::find($id);
        if(isset($perf)){
            $perf->delete();
            return response('OK',200);
        } 
        return response('Perfil não encontrada',404);
        
    }

    public function indexJson()
    {
        $perf = Perfis::all();
        return json_decode($perf);
    }
}