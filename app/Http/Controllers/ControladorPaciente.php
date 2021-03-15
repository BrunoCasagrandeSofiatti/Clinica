<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Paciente;
class ControladorPaciente extends Controller
{
    public function indexView()
    {
     return view('layout/pacientes');
    }

    public function index()
    {
        return Paciente::paginate(5);


      //  $registros = Endereco::select("pacientes.*", "enderecos.*")
      //  ->join('pacientes', 'pacientes.id_endereco', '=', 'enderecos.id')->paginate(5);

      //  return $registros->toJson();
    }

    

    public function fetch_cliente(Request $request)
    {
        if($request->has('q'))
        {
            $query = $request->q;
            $data = Paciente::select("id","nome")->where('nome', 'LIKE', "%$query%")->get();
            return $data->toJson();
        }
    }

    public function create()
    {
        return view('layout/novopaciente');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome'=> 'required|min:5|max:20',      
            'cpf'=> 'required|min:11|max:14|unique:pacientes',
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

        $paci = new Paciente();
        $paci->nome = $request->input('nome');
        $paci->cpf = $request->input('cpf');
        $paci->email = $request->input('email');
        $paci->sexo = $request->input('sexo');
        $paci->data_nascimento = $request->input('data_nascimento');
        $paci->celular = $request->input('celular');
        $paci->telefone = $request->input('telefone');
        $paci->plano = $request->input('plano');
        $paci->id_convenio = $request->input('id_convenio');
        $paci->carteirinha = $request->input('carteirinha');
        $paci->data_validade = $request->input('data_validade');
        $paci->observacao = $request->input('observacao');
        $paci->cep = $request->input('cep');
        $paci->lagradouro = $request->input('lagradouro');
        $paci->numero = $request->input('numero');
        $paci->uf = $request->input('uf');
        $paci->cidade = $request->input('cidade');
        $paci->save();

        return json_encode($paci);
    }

    public function show($id)
    {
        $paci = Paciente::find($id);
        if (asset($paci)){
            return json_encode($paci);
        }
        return response('Paciente não encontrado',404);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $paci = Paciente::find($id);
        if (asset($paci)){
            $paci->nome = $request->input('nome');
            $paci->cpf = $request->input('cpf');
            $paci->email = $request->input('email');
            $paci->sexo = $request->input('sexo');
            $paci->data_nascimento = $request->input('data_nascimento');
            $paci->celular = $request->input('celular');
            $paci->telefone = $request->input('telefone');
            $paci->plano = $request->input('plano');
            $paci->id_convenio = $request->input('id_convenio');
            $paci->carteirinha = $request->input('carteirinha');
            $paci->data_validade = $request->input('data_validade');
            $paci->observacao = $request->input('observacao');
            $paci->cep = $request->input('cep');
            $paci->lagradouro = $request->input('lagradouro');
            $paci->numero = $request->input('numero');
            $paci->uf = $request->input('uf');
            $paci->cidade = $request->input('cidade');
            $paci->save();
            return json_encode($paci);
        }
        return response('Paciente não encontrado',404);
    }


    public function destroy($id)
    {
        $paci = Paciente::find($id);
        if(isset($paci)){
            $paci->delete();
            return response('OK',200);
        } 
        return response('Paciente não encontrado',404);
        
    }

    public function indexJson()
    {
        $paci = Paciente::all();
        return json_decode($paci);
    }
}