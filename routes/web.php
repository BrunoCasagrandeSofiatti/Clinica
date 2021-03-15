<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/home', function () {
    return view('layout\base');
});

Route::get('/calendario', function () {
    return view('layout\calendario');
});


Route::get('/convenios', 'ControladorConvenio@indexview')->name('convenios')->middleware('auth');
Route::get('/convenios/box', 'ControladorConvenio@indexbox');

Route::get('/especialidades', 'ControladorEspecialidade@indexview')->name('especialidades')->middleware('auth');
Route::get('/especialidades/box', 'ControladorEspecialidade@indexbox');

Route::get('/agenda', 'ControladorAgendamento@indexview')->name('agendamentos')->middleware('auth');
Route::get('/agendamentos/box/{q}', 'ControladorAgendamento@indexcal');

Route::get('/prof_historico/historico/{id}', 'Prof_ControladorHistorico@indexhistorico');

Route::get('/agenda_encaixe/{id}', 'ControladorAgenda_encaixe@indexcal');

Route::get('/perfis', 'ControladorPerfil@indexview')->name('perfis')->middleware('auth');
Route::get('/perfis/box', 'ControladorPerfil@indexbox');

Route::get('/conselhos', 'ControladorConselho@indexview');
Route::get('/conselhos/box', 'ControladorConselho@indexbox');

Route::get('/pacientes', 'ControladorPaciente@indexview');

Route::get('/medicos', 'ControladorMedico@indexview');
Route::get('/medicos/box', 'ControladorMedico@indexbox');

Route::get('/atendentes', 'ControladorAtendente@indexview'); 

Route::get('/usuarios', 'ControladorUsuario@indexview');
Route::get('/usuarios/box', 'Auth\LoginController@indexbox');

Route::get('/sair', 'ControladorUsuario@sair'); 
Route::get('/user', 'ControladorUsuario@usuariologin');

Auth::routes();

Route::get('/home', function() {
    return view('layout\base');
})->name('home')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/prof_agenda', 'Prof_ControladorAgendamento@indexview')->name('prof_agenda');
Route::get('/prof_agenda/historicos', 'Prof_ControladorAgendamento@indexhist');


