<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Medico;

class ControladorMedico extends Controller
{
    public function indexView()
    {
     return view('layout/medicos');
    }

    public function indexbox()
    {
         $medi = Medico::all();
         return $medi->toJson();
    }

    public function fetch_medico(Request $request)
    {
        if($request->has('q'))
        {
            $query = $request->q;
            $data = Medico::select("id","nome")->where('nome', 'LIKE', "%$query%")->get();
            return $data->toJson();
        }
    }

    public function index()
    {
        return Medico::paginate(5);


      //  $registros = Endereco::select("medientes.*", "enderecos.*")
      //  ->join('medientes', 'medientes.id_endereco', '=', 'enderecos.id')->paginate(5);

      //  return $registros->toJson();
    }


    public function store(Request $request)
    {
        $regras = [
            'nome'=> 'required|min:5|max:20',      
            'cpf'=> 'required|min:11|max:14|unique:medicos',
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

        $medi = new Medico();
        $medi->nome = $request->input('nome');
        $medi->cpf = $request->input('cpf');
        $medi->id_conselho = $request->input('id_conselho');
        $medi->conselho = $request->input('conselho');
        $medi->id_especialidade = $request->input('id_especialidade');
        $medi->id_perfil = $request->input('id_perfil');
        $medi->email = $request->input('email');
        $medi->sexo = $request->input('sexo');
        $medi->data_nascimento = $request->input('data_nascimento');
        $medi->celular = $request->input('celular');
        $medi->telefone = $request->input('telefone');
        $medi->save();

        return json_encode($medi);
    }

    public function show($id)
    {
        $medi = Medico::find($id);
        if (asset($medi)){
            return json_encode($medi);
        }
        return response('Medico não encontrado',404);
    }


    public function update(Request $request, $id)
    {
        $medi = Medico::find($id);
        if (asset($medi)){
            $medi->nome = $request->input('nome');
            $medi->cpf = $request->input('cpf');
            $medi->id_conselho = $request->input('id_conselho');
            $medi->conselho = $request->input('conselho');
            $medi->id_especialidade = $request->input('id_especialidade');
            $medi->id_perfil = $request->input('id_perfil');
            $medi->email = $request->input('email');
            $medi->sexo = $request->input('sexo');
            $medi->data_nascimento = $request->input('data_nascimento');
            $medi->celular = $request->input('celular');
            $medi->telefone = $request->input('telefone');

            $medi->save();
            return json_encode($medi);
        }
        return response('Medico não encontrado',404);
    }


    public function destroy($id)
    {
        $medi = Medico::find($id);
        if(isset($medi)){
            $medi->delete();
            return response('OK',200);
        } 
        return response('Medico não encontrado',404);
        
    }

    public function indexJson()
    {
        $medi = Medico::all();
        return json_decode($medi);
    }
}