<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agendamentos;
use App\Medico;
use App\Paciente;

class ControladorAgendamento extends Controller
{
    public function indexView()
    {
     //   $conv = Convenios::paginate(2);
     //   return view('layout/convenios', compact('conv'));
     return view('layout/agenda');
    }

    public function index()
    {
        return Agendamentos::select("agendamentos.*")
        ->join('pacientes', 'pacientes.id', '=', 'agendamentos.id_paciente')->get();
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
/*        $regras = [
            'nameconv'=> 'required|min:2|max:20|unique:convenios'
            //coluna email=> 'email'
        ];

        $mensagens =[
            'required' => 'É necessario preencher o campo :attribute !',
            'nameconv.required' => 'É necessario informar um nome'
        ];
        $request->validate($regras, $mensagens);
*/
        
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

    public function show($id)
    {
        $agen = Agendamentos::find($id);
        if (asset($agen)){
            return json_encode($agen);
        }
        return response('Agendamento não encontrado',404);
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
        $agen = Agendamentos::find($id);
        if (asset($agen)){

            
        $data_start = str_replace('/','-', $request->input('start'));
        $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
        
        $data_end = str_replace('/','-', $request->input('end'));
        $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

        $agen->observacao = $request->input('observacaoo');
        $agen->start = $data_start_conv;
        $agen->end = $data_end_conv;

        //$agen->save();
        return json_encode($agen);
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