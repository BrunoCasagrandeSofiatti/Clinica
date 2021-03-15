<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Convenios;
use PhpParser\Node\Expr\Isset_;

class ControladorConvenio extends Controller
{
    public function indexView()
    {
     //   $conv = Convenios::paginate(2);
     //   return view('layout/convenios', compact('conv'));
     return view('layout/convenios');
    }

    public function index()
    {
        return Convenios::paginate(5);
         //$convs = Convenios::all();
         //return $convs->toJson();
    }

    public function indexbox()
    {
         $convs = Convenios::all();
         return $convs->toJson();
    }

    public function create()
    {
        return view('layout/novoconvenio');
        
    }

    public function store(Request $request)
    {

        $regras = [
            'name'=> 'required|min:2|max:15|unique:convenios'        
        ];

        $mensagens =[
            'name.min' => 'Para o campo Nome Convênio é necessário informar pelo menos 2 letras',
            'name.max' => 'O tamanho máximo para campo Nome Convenio não pode ultrapasar 15 letras',
            'name.unique' => 'Já existe um convêncio cadastrado com este nome',            
            'name.required' => 'É necessario informar um convenio'
        ];
        
        $request->validate($regras, $mensagens);
        
        $conv = new Convenios();
        $conv->name = $request->input('name');
        $conv->save();
        return json_encode($conv);
    }

    public function show($id)
    {
        $conv = Convenios::find($id);
        if (asset($conv)){
            return json_encode($conv);
        }
        return response('Convênio não encontrado',404);
    }

    public function update(Request $request, $id)
    {
        $conv = Convenios::find($id);
        if (asset($conv)){
            $conv->name = $request->input('name');
            $conv->save();
            return json_encode($conv);
        }
        return response('Convênio não encontrado',404);
    }

    public function destroy($id)
    {
        $conv = Convenios::find($id);
        if(isset($conv)){
            $conv->delete();
            return response('OK',200);
        } 
        return response('Categoria não encontrada',404);
        
    }

    public function indexJson()
    {
        $conv = Convenios::all();
        return json_decode($conv);
    }
}
