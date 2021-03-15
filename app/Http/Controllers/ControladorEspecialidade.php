<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Especialidades;
use PhpParser\Node\Expr\Isset_;

class ControladorEspecialidade extends Controller
{
    public function indexView()
    {
     //   $espe = espeenios::paginate(2);
     //   return view('layout/espeenios', compact('espe'));
     return view('layout/especialidades');
    }

    public function index()
    {
        return Especialidades::paginate(5);
         //$espec = espeenios::all();
         //return $espec->toJson();
    }

    public function indexbox()
    {
         $espec = Especialidades::all();
         return $espec->toJson();
    }

    public function create()
    {
        return view('layout/novaespecialidade');
        
    }

    public function store(Request $request)
    {
        $regras = [
            'name'=> 'required|min:2|max:15|unique:especialidades'        
        ];

        $mensagens =[
            'name.min' => 'Para o campo Nome especialidade é necessário informar pelo menos 2 letras',
            'name.max' => 'O tamanho máximo para campo Nome especialidade não pode ultrapasar 15 letras',
            'name.unique' => 'Já existe uma especialidade cadastrada com este nome',            
            'name.required' => 'É necessario informar uma especialidade'
        ];
        $request->validate($regras, $mensagens);
        
        $espe = new Especialidades();
        $espe->name = $request->input('name');
        $espe->save();
        return json_encode($espe);
    }

    public function show($id)
    {
        $espe = Especialidades::find($id);
        if (asset($espe)){
            return json_encode($espe);
        }
        return response('Especialidade não encontrada',404);
    }

   /* public function edit($id)
    {
        $espe = espeenios::find($id);
        if (asset($espe)){
            return view('\layou\editarespeenio',compact('espe'));
        }
        return redirect('espeenios');
    }*/

    public function update(Request $request, $id)
    {
        $espe = Especialidades::find($id);
        if (asset($espe)){
            $espe->name = $request->input('name');
            $espe->save();
            return json_encode($espe);
        }
        return response('Especialidade não encontrada',404);
    }

    public function destroy($id)
    {
        $espe = Especialidades::find($id);
        if(isset($espe)){
            $espe->delete();
            return response('OK',200);
        } 
        return response('Especialidade não encontrada',404);
        
    }

    public function indexJson()
    {
        $espe = Especialidades::all();
        return json_decode($espe);
    }
}
