<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/convenios', 'ControladorConvenio');
Route::resource('/especialidades', 'ControladorEspecialidade');
Route::resource('/perfis', 'ControladorPerfil');
Route::resource('/medicos', 'ControladorMedico');
Route::resource('/conselhos', 'ControladorConselho');
Route::resource('/pacientes', 'ControladorPaciente');
Route::resource('/atendentes', 'ControladorAtendente');
Route::resource('/users', 'ControladorUser');
Route::resource('/agendamentos', 'ControladorAgendamento');
Route::resource('/agenda_encaixe', 'ControladorAgenda_encaixe');
Route::resource('/prof_agenda', 'Prof_ControladorAgendamento');
Route::resource('/prof_historico', 'Prof_Controladorhistorico');
Route::resource('/usuarios', 'ControladorUsuario');
//Route::resource('/prof_historico/historico/{$id}', 'ControladorHistorico');

//Route::get('/secretaria_pacientesPesquisa/{desc}/{id}', 'Admin\Cadastro_pacientesController@PacientesPesquisa')->name('secretaria_pacientesPesquisa');

Route::get('/profissional_autocomplete_cliente/fetch', 'ControladorPaciente@fetch_cliente')->name('profissional_autocomplete_cliente.fetch');

Route::get('/profissional_autocomplete_atendente/fetch', 'ControladorAtendente@fetch_atendente')->name('profissional_autocomplete_atendente.fetch');
Route::get('/profissional_autocomplete_medico/fetch', 'ControladorMedico@fetch_medico')->name('profissional_autocomplete_medico.fetch');