<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agendamentos;
use App\AgendaEncaixes;
use App\Medico;
use App\Paciente;

class ControladorAgenda_encaixe extends Controller
{

    public function indexcal($request)
    {
        if(isset($request)){
            $query = $request;
            $agen = AgendaEncaixes::select("AgendaEncaixes.*")    
            ->where('AgendaEncaixes.id_medico','=',"$query")
            ->where('AgendaEncaixes.status','=',"A")
            ->orderByRaw('color DESC')->get();
            return json_encode($agen);
        }
    }

    public function store(Request $request)
    {
        $regras = [
            'paciente'=> 'required|min:3|max:25'        
        ];

        $mensagens =[
            'paciente.min' => 'Para o campo Nome Paciente é necessário informar pelo menos 3 letras',
            'paciente.max' => 'O tamanho máximo para campo Nome Paciente não pode ultrapasar 25 letras',      
            'paciente.required' => 'É necessario informar um nome para o encaixe desejado'
        ];
        
        $request->validate($regras, $mensagens);

          
          $agen = new AgendaEncaixes();

          $agen->paciente = $request->input('paciente');
          $agen->id_medico= $request->input('id_medico');
          $agen->color= $request->input('color');
          $agen->status = 'A';

          $agen->save();
          return json_encode($agen);
    }

    public function show($id)
    {
        $agen = AgendaEncaixes::find($id);
        if (asset($agen)){
            return json_encode($agen);
        }
        return response('Agendamento não encontrado',404);
    }

    public function update(Request $request, $id)
    {
        $enca = AgendaEncaixes::find($id);

        if (asset($enca)){
        
        $enca->status = 'P';
        $enca->save();  // altera encaixe para processado
            
        $agen = new Agendamentos();

        $data_start = str_replace('/','-', $request->input('start'));
        $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
        
        $data_end = str_replace('/','-', $request->input('end'));
        $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

        $agen->observacao = $request->input('observacao');
        $agen->id_medico= $request->input('id_medico');
        $agen->id_paciente= $request->input('id_paciente');
        $agen->start = $data_start_conv;
        $agen->end = $data_end_conv;
   
        $agen->save();
        return json_encode($agen);
        }
        
        return response('Encaixe não encontrado',404);
    }


    public function destroy($id)
    {
        $agen = AgendaEncaixes::find($id);
        if(isset($agen)){
            $agen->delete();
            return response('OK',200);
        } 
        return response('Agendamento não encontrada',404);
        
    }

    public function indexJson()
    {
        $perf = AgendaEncaixes::all();
        return json_decode($perf);
    }
}