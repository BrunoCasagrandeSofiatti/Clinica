<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agendamentos;
use App\Historico_pacientes;
use App\Paciente;



class Prof_ControladorHistorico extends Controller
{
    

    public function indexhistorico($id)
    {
        $paciente = Agendamentos::select("id_paciente")->where('id', '=', "$id")->value('id_paciente');

        $data = Historico_pacientes::select("Historico_pacientes.id",
        "Historico_pacientes.descricao",
        "Historico_pacientes.created_at",
        "Historico_pacientes.id_paciente",)
        ->where('Historico_pacientes.id_paciente', '=', "$paciente")->get();
         
        return $data->toJson();
    }

    public function update(Request $request, $id)
    {        
        $hist = $request->input('descricao');
        $hpac = new Historico_pacientes();
        $user = Agendamentos::select("id_paciente")->where('id', '=', "$id")->value('id_paciente');
                
       if (asset($hist)){     // salvar historico do paciente
        $hpac->descricao = $request->input('descricao');
        $hpac->id_consulta = $id;
        $hpac->id_paciente = $user;
        $hpac->save();
        return json_encode($hpac);
        }

        return response('Agendamento não encontrado',404);
    }
}