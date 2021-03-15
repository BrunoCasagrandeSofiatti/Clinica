<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agendamentos;
use App\Medico;
use App\Paciente;
use App\Historico_pacientes;

class Prof_ControladorAgendamento extends Controller
{
    public function indexView()
    {
     //   $conv = Convenios::paginate(2);
     //   return view('layout/convenios', compact('conv'));
     return view('layout_v1/prof_agendamentos');
    }

    public function index()
    {
        return Agendamentos::select("agendamentos.*")
        ->join('pacientes', 'pacientes.id', '=', 'agendamentos.id_paciente')->get();
    }

    public function indexhist()
    {
        return Agendamentos::select("agendamentos.id_paciente",
        "Historico_pacientes.descricao", 
        "Historico_pacientes.created_at")
        ->join('Historico_pacientes', 'Historico_pacientes.id_consulta', '=', 'agendamentos.id')->get();
 
    }

    public function indexcal($request)
    {
        if(isset($request)){
            $query = $request;
            $agen = Agendamentos::select("agendamentos.id","pacientes.nome AS title", "agendamentos.start","agendamentos.end","agendamentos.color","agendamentos.observacao AS observacao")
            ->join('pacientes', 'pacientes.id', '=', 'agendamentos.id_paciente')
            ->where('agendamentos.id_medico','=',"$query")->get();
            return $agen->toJson();
        }


        $agen = Agendamentos::all();
        return $agen->toJson();         
         //->join('medicos', 'medicos.id', '=', 'agendamentos.id_medico')->paginate(5);
    }

    public function store(Request $request)
    {     
        $agen = new Agendamentos();
        
     
        $agen->observacao = $request->input('observacao');

        $agen->color = $request->input('color');

        $agen->save();
        return json_encode($agen);
    }

    public function show($id)
    {
        $agen = Agendamentos::find($id);
        if (asset($agen)){
            return json_encode($agen);
        }
        return response('Agendamento não encontrado',404);
    }


    public function update(Request $request, $id)
    {
        $agen = Agendamentos::find($id);
        $core = $request->input('colorr');
        $corr = $request->input('color');
        $color = Agendamentos::select("color")->where('id', '=', "$id")->value('color');

        if ($corr == '#fce703' && $corr != $color){  //tratar cancelamento de agendamento 
            $agen->color = $corr;
            $agen->save();
            return json_encode($corr);
        }        

        else if ($core == '#00a65a'){   //tratar finalizar consulta
            $agen->color = $core;
            $agen->save();
            return json_encode($core);
        }

        return response('Agendamento não encontrado',404);
    }

    public function destroy($id)
    {
        $agen = Agendamentos::find($id);
        if(isset($agen)){
            $agen->delete();
            return response('OK',200);
        } 
        return response('Agendamento não encontrada',404);
        
    }

    public function indexJson()
    {
        $perf = Agendamentos::all();
        return json_decode($perf);
    }
}