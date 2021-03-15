<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Conselhos;
use PhpParser\Node\Expr\Isset_;

class ControladorConselho extends Controller
{
    public function indexView()
    {
     //   $cons = consenios::paginate(2);
     //   return view('layout/consenios', compact('cons'));
     return view('layout/Conselhos');
    }

    public function index()
    {
        return Conselhos::paginate(5);
         //$consc = consenios::all();
         //return $consc->toJson();
    }

    public function indexbox()
    {
         $conse = Conselhos::all();
         return $conse->toJson();
    }

    public function create()
    {
        return view('layout/novoconselho');
        
    }

    public function store(Request $request)
    {
        $regras = [
            'name'=> 'required|min:2|max:15|unique:conselhos',       
            'descricao'=> 'required|min:5|max:15'
        ];

        $mensagens =[
            'name.min' => 'Para o campo Nome Conselho é necessário informar pelo menos 2 letras',
            'name.max' => 'O tamanho máximo para campo Nome Conselho não pode ultrapasar 15 letras',
            'name.unique' => 'Já existe um Conselho cadastrada com este nome!',            
            'name.required' => 'É necessario informar um Conselho',
            'descricao.min' => 'Para o campo Descrição Conselho é necessário informar pelo menos 5 letras',
            'descricao.max' => 'O tamanho máximo para campo Descrição Conselho não pode ultrapasar 15 letras',            
            'descricao.required' => 'É necessario informar uma Descrição'
        ];
        $request->validate($regras, $mensagens);
        
        $cons = new Conselhos();
        $cons->name = $request->input('name');
        $cons->descricao = $request->input('descricao');
        $cons->save();
        return json_encode($cons);
    }

    public function show($id)
    {
        $cons = Conselhos::find($id);
        if (asset($cons)){
            return json_encode($cons);
        }
        return response('Conselho não encontrado',404);
    }

   /* public function edit($id)
    {
        $cons = consenios::find($id);
        if (asset($cons)){
            return view('\layou\editarconsenio',compact('cons'));
        }
        return redirect('consenios');
    }*/

    public function update(Request $request, $id)
    {
        $cons = Conselhos::find($id);
        if (asset($cons)){
            $cons->name = $request->input('name');
            $cons->descricao = $request->input('descricao');
            $cons->save();
            return json_encode($cons);
        }
        return response('Conselho não encontrado',404);
    }

    public function destroy($id)
    {
        $cons = Conselhos::find($id);
        if(isset($cons)){
            $cons->delete();
            return response('OK',200);
        } 
        return response('Conselho não encontrado',404);
        
    }

    public function indexJson()
    {
        $cons = Conselhos::all();
        return json_decode($cons);
    }
}
