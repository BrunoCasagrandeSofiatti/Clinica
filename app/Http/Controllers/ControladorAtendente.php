<?php

namespace App\Http\Controllers;

use App\Atendente;
use Illuminate\Http\Request;

class ControladorAtendente extends Controller
{
    public function indexView()
    {
     return view('layout/atendentes');
    }

    public function index()
    {
        return Atendente::paginate(5);


      //  $registros = Endereco::select("medientes.*", "enderecos.*")
      //  ->join('medientes', 'medientes.id_endereco', '=', 'enderecos.id')->paginate(5);

      //  return $registros->toJson();
    }

    public function fetch_atendente(Request $request)
    {
        if($request->has('q'))
        {
            $query = $request->q;
            $data = Atendente::select("id","nome")->where('nome', 'LIKE', "%$query%")->get();
            return $data->toJson();
        }
    }


    public function store(Request $request)
    {

        $regras = [
            'nome'=> 'required|min:5|max:20',      
            'cpf'=> 'required|min:11|max:14|unique:atendentes',
            'email'=> 'min:5|max:20|email:rfc,dns',        
            'sexo'=> 'required',        
            'data_nascimento'=> 'required',               
        ];

        $mensagens =[
            'nome.min' => 'Para o campo Nome é necessário informar pelo menos 5 letras',
            'nome.max' => 'O tamanho máximo para campo Nome não pode ultrapasar 20 letras',            
            'nome.required' => 'É necessario informar um Nome',

            'cpf.min' => 'Para o campo CPF é necessário informar pelo menos 11 digitos',
            'cpf.max' => 'O tamanho máximo para campo CPF não pode ultrapasar 14 digitos',            
            'cpf.required' => 'É obrigatório informar um CPF',
            'cpf.unique' => 'Já existe um CPF cadastrado, favor verificar!',            

            'email.min' => 'Para o campo E-mail é necessário informar pelo menos 5 caracteres',
            'email.max' => 'O tamanho máximo para campo E-mail não pode ultrapasar 20 caracteres',            
            'email.email' => 'E-mail incorreto! Favor verificar.',

            'sexo.required' => 'É obrigatório informar um Sexo',

            'data_nascimento.required' => 'É obrigatório informar a data de nascimento',
            
        ];
        $request->validate($regras, $mensagens);

        $aten = new Atendente();
        $aten->nome = $request->input('nome');
        $aten->cpf = $request->input('cpf');
        $aten->id_perfil = $request->input('id_perfil');
        $aten->email = $request->input('email');
        $aten->sexo = $request->input('sexo');
        $aten->data_nascimento = $request->input('data_nascimento');
        $aten->celular = $request->input('celular');
        $aten->telefone = $request->input('telefone');
        $aten->save();

        return json_encode($aten);
    }

    public function show($id)
    {
        $aten = Atendente::find($id);
        if (asset($aten)){
            return json_encode($aten);
        }
        return response('Atendente não encontrado',404);
    }


    public function update(Request $request, $id)
    {
        $aten = Atendente::find($id);
        if (asset($aten)){
            $aten->nome = $request->input('nome');
            $aten->cpf = $request->input('cpf');
            $aten->id_perfil = $request->input('id_perfil');
            $aten->email = $request->input('email');
            $aten->sexo = $request->input('sexo');
            $aten->data_nascimento = $request->input('data_nascimento');
            $aten->celular = $request->input('celular');
            $aten->telefone = $request->input('telefone');

            $aten->save();
            return json_encode($aten);
        }
        return response('Atendente não encontrado',404);
    }


    public function destroy($id)
    {
        $aten = Atendente::find($id);
        if(isset($aten)){
            $aten->delete();
            return response('OK',200);
        } 
        return response('Atendente não encontrado',404);
        
    }

    public function indexJson()
    {
        $aten = Atendente::all();
        return json_decode($aten);
    }
}