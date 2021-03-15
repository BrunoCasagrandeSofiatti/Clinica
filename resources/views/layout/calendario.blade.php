<div class="content">
  <div class="container-fluid">
      <div class="card border">
          <div class="card-header card-header-cinza">
              <div class="form-row">
                  <div class="form-group col-md-5">
                      <div id="datatables_filter" class="dataTables_filter">

                          <span class="bmd-form-group bmd-form-group-sm">
                              <input type="search" class="Pesquisa-texto form-control form-control-sm "
                                     placeholder="Descrição" aria-controls="datatables"
                                     id="Pesquisa-texto">
                          </span>

                      </div>
                  </div>
                  <div class="form-group col-md-7">
                      <div id="datatables_filter" class="dataTables_filter">

                          <button class="btn waves-effect btn-white text-dark " style="float: right;"
                                  role="button" onClick="limparPesquisa()">Limpar
                          </button>

                          <button class="btn waves-effect btn-white text-dark " style="float: right;"
                                  role="button" onClick="carregarPesquisa()">Pesquisar
                          </button>


                      </div>

                  </div>

              </div>
          </div>
          <div class="table-responsive">
              <table class="table" id="tabelaView">
                  <thead class=" text-primary">
                  <tr>
                      <th>Código</th>
                      <th>Descrição</th>
                      <th class="text-center">Ação</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>

          </div>
          <div class="card-footer">
              <button class="btn waves-effect waves-light " role="button" onClick="novoAgenda()">Nova Agenda
              </button>
              <nav id="paginationNav">
                  <ul class="pagination">
                  </ul>
              </nav>
          </div>
      </div>

      <div class="modal modal-fixed-footer" role="dialog" id="dlgAgendas">
          <div class="modal-dialog" role="document" id="modalAgendas" name="modalAgendas">
              <form class="form-horizontal" id="formAgenda">
                  <div class="modal-content">
                      <div class="form-row">
                          <div class="modal-header">
                              <h5 class="modal-title">Nova Agenda</h5>
                          </div>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" id="idAgenda" class="form-control">
                          <div class="form-row">

                              <div class="form-group col-md-6">
                                  <label for="Descricao" class="control-label">Descrição</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control" id="Descricao"
                                             placeholder="Descrição">
                                  </div>
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="Tempo_Atendimento" class="control-label">Tempo Atendimento</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" min="0" max="1440"
                                             class="form-control" id="Tempo_Atendimento" placeholder="Minutos"
                                             onkeypress="return somenteNumeros(event)">
                                  </div>
                              </div>

                          </div>
                          <div class="form-row">


                              <div class="form-group col-md-2">
                                  <label>
                                      <input autocomplete="off" type="checkbox" class="filled-in" value="1"
                                             id="Segunda"/>
                                      <span>Segunda</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Segunda_Hora_Inicial" class="control-label">Segunda Hora
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Segunda_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Segunda_Hora_Final" class="control-label">Segunda Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Segunda_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Segunda_Intervalo_Inicial" class="control-label">Segunda Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Segunda_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Segunda_Intervalo_Final" class="control-label">Segunda Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Segunda_Intervalo_Final">
                                  </div>
                              </div>
                          </div>

                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Terca"/>
                                      <span>Terça</span>
                                  </label>
                              </div>


                              <div class="form-group col-md-2">
                                  <label for="Terca_Hora_Inicial" class="control-label">Terca Hora Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Terca_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Terca_Hora_Final" class="control-label">Terca Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Terca_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Terca_Intervalo_Inicial" class="control-label">Terca Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Terca_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Terca_Intervalo_Final" class="control-label">Terca Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Terca_Intervalo_Final">
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Quarta"/>
                                      <span>Quarta</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quarta_Hora_Inicial" class="control-label">Quarta Hora
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quarta_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quarta_Hora_Final" class="control-label">Quarta Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quarta_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quarta_Intervalo_Inicial" class="control-label">Quarta Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quarta_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quarta_Intervalo_Final" class="control-label">Quarta Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quarta_Intervalo_Final">
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Quinta"/>
                                      <span>Quinta</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quinta_Hora_Inicial" class="control-label">Quinta Hora
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quinta_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quinta_Hora_Final" class="control-label">Quinta Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quinta_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quinta_Intervalo_Inicial" class="control-label">Quinta Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quinta_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Quinta_Intervalo_Final" class="control-label">Quinta Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Quinta_Intervalo_Final">
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Sexta"/>
                                      <span>Sexta</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sexta_Hora_Inicial" class="control-label">Sexta Hora Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sexta_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sexta_Hora_Final" class="control-label">Sexta Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sexta_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sexta_Intervalo_Inicial" class="control-label">Sexta Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sexta_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sexta_Intervalo_Final" class="control-label">Sexta Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sexta_Intervalo_Final">
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Sabado"/>
                                      <span>Sábado</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sabado_Hora_Inicial" class="control-label">Sabado Hora
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sabado_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sabado_Hora_Final" class="control-label">Sabado Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sabado_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sabado_Intervalo_Inicial" class="control-label">Sabado Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sabado_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Sabado_Intervalo_Final" class="control-label">Sabado Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Sabado_Intervalo_Final">
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">

                              <div class="form-group col-md-2">
                                  <label>
                                      <input type="checkbox" class="filled-in" value="1" id="Domingo"/>
                                      <span>Domingo</span>
                                  </label>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Domingo_Hora_Inicial" class="control-label">Domingo Hora
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Domingo_Hora_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Domingo_Hora_Final" class="control-label">Domingo Hora Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Domingo_Hora_Final">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Domingo_Intervalo_Inicial" class="control-label">Domingo Interv.
                                      Inicial</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Domingo_Intervalo_Inicial">
                                  </div>
                              </div>

                              <div class="form-group col-md-2">
                                  <label for="Domingo_Intervalo_Final" class="control-label">Domingo Interv.
                                      Final</label>
                                  <div class="input-group">
                                      <input autocomplete="off" type="text" class="form-control timepicker"
                                             id="Domingo_Intervalo_Final">
                                  </div>
                              </div>
                          </div>


                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Salvar</button>
                          <a class="modal-close waves-effect waves-light btn" data-dismiss="modal">Cancelar</a>
                      </div>
                  </div>

              </form>
          </div>

      </div>
  </div>
</div>

@section('script')
<script type="text/javascript">

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
  });

  function somenteNumeros(e) {
      var charCode = e.charCode ? e.charCode : e.keyCode;
      // charCode 8 = backspace
      // charCode 9 = tab
      if (charCode != 8 && charCode != 9) {
          // charCode 48 equivale a 0
          // charCode 57 equivale a 9
          if (charCode < 48 || charCode > 57) {
              return false;
          }
      }
  }

  function number_default(valor) {
      if (valor == "") {
          return 0;
      } else {
          return valor;
      }
  }

  function novoAgenda() {
      $('#idAgenda').val('');
      $('#Tempo_Atendimento').val('');
      $('#Segunda').removeAttr("checked");//attr( "checked", "checked" );
      $('#Segunda_Hora_Inicial').val('');
      $('#Segunda_Hora_Final').val('');
      $('#Segunda_Intervalo_Inicial').val('');
      $('#Segunda_Intervalo_Final').val('');
      $('#Terca').removeAttr("checked");
      $('#Terca_Hora_Inicial').val('');
      $('#Terca_Hora_Final').val('');
      $('#Terca_Intervalo_Inicial').val('');
      $('#Terca_Intervalo_Final').val('');
      $('#Quarta').removeAttr("checked");
      $('#Quarta_Hora_Inicial').val('');
      $('#Quarta_Hora_Final').val('');
      $('#Quarta_Intervalo_Inicial').val('');
      $('#Quarta_Intervalo_Final').val('');
      $('#Quinta').removeAttr("checked");
      $('#Quinta_Hora_Inicial').val('');
      $('#Quinta_Hora_Final').val('');
      $('#Quinta_Intervalo_Inicial').val('');
      $('#Quinta_Intervalo_Final').val('');
      $('#Sexta').removeAttr("checked");
      $('#Sexta_Hora_Inicial').val('');
      $('#Sexta_Hora_Final').val('');
      $('#Sexta_Intervalo_Inicial').val('');
      $('#Sexta_Intervalo_Final').val('');
      $('#Sabado').removeAttr("checked");
      $('#Sabado_Hora_Inicial').val('');
      $('#Sabado_Hora_Final').val('');
      $('#Sabado_Intervalo_Inicial').val('');
      $('#Sabado_Intervalo_Final').val('');
      $('#Domingo').removeAttr("checked");
      $('#Domingo_Hora_Inicial').val('');
      $('#Domingo_Hora_Final').val('');
      $('#Domingo_Intervalo_Inicial').val('');
      $('#Domingo_Intervalo_Final').val('');
      $('#Descricao').val('');
      $('#dlgAgendas').modal('show');
  }

  function check_editar(valor) {
      if (valor == 1) {
          return true;
      } else {
          return false;
      }
  }

  function editar(id) {
      $.getJSON('/api/secretaria/agendas/' + id, function (data) {
          $('#idAgenda').val(data.idAgenda);
          $('#Tempo_Atendimento').val(number_default(data.Tempo_Atendimento));
          $('#Segunda_Hora_Final').val(data.Segunda_Hora_Final);
          $('#Segunda_Hora_Inicial').val(data.Segunda_Hora_Inicial);
          $('#Segunda').prop("checked", check_editar(data.Segunda));
          $('#Segunda_Intervalo_Inicial').val(data.Segunda_Intervalo_Inicial);
          $('#Segunda_Intervalo_Final').val(data.Segunda_Intervalo_Final);
          $('#Terca').prop("checked", check_editar(data.Terca));
          $('#Terca_Hora_Inicial').val(data.Terca_Hora_Inicial);
          $('#Terca_Hora_Final').val(data.Terca_Hora_Final);
          $('#Terca_Intervalo_Final').val(data.Terca_Intervalo_Final);
          $('#Quarta').prop("checked", check_editar(data.Quarta));
          $('#Quarta_Hora_Inicial').val(data.Quarta_Hora_Inicial);
          $('#Quarta_Hora_Final').val(data.Quarta_Hora_Final);
          $('#Quarta_Intervalo_Inicial').val(data.Quarta_Intervalo_Inicial);
          $('#Quarta_Intervalo_Final').val(data.Quarta_Intervalo_Final);
          $('#Quinta').prop("checked", check_editar(data.Quinta));
          $('#Quinta_Hora_Inicial').val(data.Quinta_Hora_Inicial);
          $('#Quinta_Hora_Final').val(data.Quinta_Hora_Final);
          $('#Quinta_Intervalo_Inicial').val(data.Quinta_Intervalo_Inicial);
          $('#Quinta_Intervalo_Final').val(data.Quinta_Intervalo_Final);
          $('#Sexta').prop("checked", check_editar(data.Sexta));
          $('#Sexta_Hora_Inicial').val(data.Sexta_Hora_Inicial);
          $('#Sexta_Hora_Final').val(data.Sexta_Hora_Final);
          $('#Sexta_Intervalo_Inicial').val(data.Sexta_Intervalo_Inicial);
          $('#Sexta_Intervalo_Final').val(data.Sexta_Intervalo_Final);
          $('#Sabado').prop("checked", check_editar(data.Sabado));
          $('#Sabado_Hora_Inicial').val(data.Sabado_Hora_Inicial);
          $('#Sabado_Hora_Final').val(data.Sabado_Hora_Final);
          $('#Sabado_Intervalo_Inicial').val(data.Sabado_Intervalo_Inicial);
          $('#Sabado_Intervalo_Final').val(data.Sabado_Intervalo_Final);
          $('#Domingo').prop("checked", check_editar(data.Domingo));
          $('#Domingo_Hora_Inicial').val(data.Domingo_Hora_Inicial);
          $('#Domingo_Hora_Final').val(data.Domingo_Hora_Final);
          $('#Domingo_Intervalo_Inicial').val(data.Domingo_Intervalo_Inicial);
          $('#Domingo_Intervalo_Final').val(data.Domingo_Intervalo_Final);
          $('#Descricao').val(data.Descricao);

          $('#dlgAgendas').modal('show');
      });
  }

  function remover(id) {
      $.ajax({
          type: "DELETE",
          url: "/api/secretaria/agendas/" + id,
          context: this,
          success: function () {
              linhas = $("#tabelaView>tbody>tr");
              e = linhas.filter(function (i, elemento) {
                  return elemento.cells[0].textContent == id;
              });
              if (e)
                  e.remove();
          },
          error: function (error) {
              console.log(error);
          }
      });
  }

  function check(valor) {
      if (valor == true) {
          return 1;
      } else {
          return 0;
      }
  }
  function criarAgenda() {
      agenda = {
          Tempo_Atendimento: number_default($("#Tempo_Atendimento").val()),
          Segunda_Hora_Final: $("#Segunda_Hora_Final").val(),
          Segunda_Hora_Inicial: $("#Segunda_Hora_Inicial").val(),
          Segunda: check($('#Segunda').is(':checked')),
          Segunda_Intervalo_Inicial: $("#Segunda_Intervalo_Inicial").val(),
          Segunda_Intervalo_Final: $("#Segunda_Intervalo_Final").val(),
          Terca: check($("#Terca").is(':checked')),
          Terca_Hora_Inicial: $("#Terca_Hora_Inicial").val(),
          Terca_Hora_Final: $("#Terca_Hora_Final").val(),
          Terca_Intervalo_Final: $("#Terca_Intervalo_Final").val(),
          Quarta: check($("#Quarta").is(':checked')),
          Quarta_Hora_Inicial: $("#Quarta_Hora_Inicial").val(),
          Quarta_Hora_Final: $("#Quarta_Hora_Final").val(),
          Quarta_Intervalo_Inicial: $("#Quarta_Intervalo_Inicial").val(),
          Quarta_Intervalo_Final: $("#Quarta_Intervalo_Final").val(),
          Quinta: check($("#Quinta").is(':checked')),
          Quinta_Hora_Inicial: $("#Quinta_Hora_Inicial").val(),
          Quinta_Hora_Final: $("#Quinta_Hora_Final").val(),
          Quinta_Intervalo_Inicial: $("#Quinta_Intervalo_Inicial").val(),
          Quinta_Intervalo_Final: $("#Quinta_Intervalo_Final").val(),
          Sexta: check($("#Sexta").is(':checked')),
          Sexta_Hora_Inicial: $("#Sexta_Hora_Inicial").val(),
          Sexta_Hora_Final: $("#Sexta_Hora_Final").val(),
          Sexta_Intervalo_Inicial: $("#Sexta_Intervalo_Inicial").val(),
          Sexta_Intervalo_Final: $("#Sexta_Intervalo_Final").val(),
          Sabado: check($("#Sabado").is(':checked')),
          Sabado_Hora_Inicial: $("#Sabado_Hora_Inicial").val(),
          Sabado_Hora_Final: $("#Sabado_Hora_Final").val(),
          Sabado_Intervalo_Inicial: $("#Sabado_Intervalo_Inicial").val(),
          Sabado_Intervalo_Final: $("#Sabado_Intervalo_Final").val(),
          Domingo: check($("#Domingo").is(':checked')),
          Domingo_Hora_Inicial: $("#Domingo_Hora_Inicial").val(),
          Domingo_Hora_Final: $("#Domingo_Hora_Final").val(),
          Domingo_Intervalo_Inicial: $("#Domingo_Intervalo_Inicial").val(),
          Domingo_Intervalo_Final: $("#Domingo_Intervalo_Final").val(),
          Descricao: $("#Descricao").val()

      };
      $.ajax({
          type: "POST",
          url: "/api/secretaria/agendas",
          context: this,
          data: agenda,
          success: function (data) {
              agenda = JSON.parse(data);
              linha = montarLinha(agenda);
              $('#tabelaView>tbody').append(linha);

              $("#dlgAgendas").modal('hide');
          },
          error: function (errors) {
              var listaerros = "";
              if(!errors.responseJSON){
                  mostraDialogo(errors.responseText,'danger');
              }else{
                  $.each(errors.responseJSON.errors, function (key, value) {
                      listaerros =  listaerros + '<p>'+value+'</p>';
                  });
                  mostraDialogo(listaerros,'danger');
              }
          }
      });
  }

  function salvarAgenda() {

      agenda = {
          idAgenda: $("#idAgenda").val(),
          Tempo_Atendimento: $("#Tempo_Atendimento").val(),
          Segunda_Hora_Final: $("#Segunda_Hora_Final").val(),
          Segunda_Hora_Inicial: $("#Segunda_Hora_Inicial").val(),
          Segunda: check($("#Segunda").is(':checked')),
          Segunda_Intervalo_Inicial: $("#Segunda_Intervalo_Inicial").val(),
          Segunda_Intervalo_Final: $("#Segunda_Intervalo_Final").val(),
          Terca: check($("#Terca").is(':checked')),
          Terca_Hora_Inicial: $("#Terca_Hora_Inicial").val(),
          Terca_Hora_Final: $("#Terca_Hora_Final").val(),
          Terca_Intervalo_Final: $("#Terca_Intervalo_Final").val(),
          Quarta: check($("#Quarta").is(':checked')),
          Quarta_Hora_Inicial: $("#Quarta_Hora_Inicial").val(),
          Quarta_Hora_Final: $("#Quarta_Hora_Final").val(),
          Quarta_Intervalo_Inicial: $("#Quarta_Intervalo_Inicial").val(),
          Quarta_Intervalo_Final: $("#Quarta_Intervalo_Final").val(),
          Quinta: check($("#Quinta").is(':checked')),
          Quinta_Hora_Inicial: $("#Quinta_Hora_Inicial").val(),
          Quinta_Hora_Final: $("#Quinta_Hora_Final").val(),
          Quinta_Intervalo_Inicial: $("#Quinta_Intervalo_Inicial").val(),
          Quinta_Intervalo_Final: $("#Quinta_Intervalo_Final").val(),
          Sexta: check($("#Sexta").is(':checked')),
          Sexta_Hora_Inicial: $("#Sexta_Hora_Inicial").val(),
          Sexta_Hora_Final: $("#Sexta_Hora_Final").val(),
          Sexta_Intervalo_Inicial: $("#Sexta_Intervalo_Inicial").val(),
          Sexta_Intervalo_Final: $("#Sexta_Intervalo_Final").val(),
          Sabado: check($("#Sabado").is(':checked')),
          Sabado_Hora_Inicial: $("#Sabado_Hora_Inicial").val(),
          Sabado_Hora_Final: $("#Sabado_Hora_Final").val(),
          Sabado_Intervalo_Inicial: $("#Sabado_Intervalo_Inicial").val(),
          Sabado_Intervalo_Final: $("#Sabado_Intervalo_Final").val(),
          Domingo: check($("#Domingo").is(':checked')),
          Domingo_Hora_Inicial: $("#Domingo_Hora_Inicial").val(),
          Domingo_Hora_Final: $("#Domingo_Hora_Final").val(),
          Domingo_Intervalo_Inicial: $("#Domingo_Intervalo_Inicial").val(),
          Domingo_Intervalo_Final: $("#Domingo_Intervalo_Final").val(),
          Descricao: $("#Descricao").val()
      };
      $.ajax({
          type: "PUT",
          url: "/api/secretaria/agendas/" + agenda.idAgenda,
          context: this,
          data: agenda,
          success: function (data) {
              prod = JSON.parse(data);
              linhas = $("#tabelaView>tbody>tr");
              e = linhas.filter(function (i, e) {
                  return ( e.cells[0].textContent == agenda.idAgenda );
              });
              if (e) {
                  e[0].cells[0].textContent = agenda.idAgenda;
                  e[0].cells[1].textContent = agenda.Descricao;
              }
              $("#dlgAgendas").modal('hide');
          },
          error: function (error) {
              console.log(error);
          }
      });
  }

  $("#formAgenda").submit(function (event) {
      event.preventDefault();
      if ($("#idAgenda").val() != '')
          salvarAgenda();
      else
          criarAgenda();
      //$("#dlgAgendas").modal('hide');
  });

  function getNextItem(data) {
      i = data.current_page + 1;
      if (data.current_page == data.last_page)
          s = '<li class="page-item disabled">';
      else
          s = '<li class="page-item">';
      s += '<a class="page-link" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);">Próximo</a></li>';
      return s;
  }

  function getPreviousItem(data) {
      i = data.current_page - 1;
      if (data.current_page == 1)
          s = '<li class="page-item disabled">';
      else
          s = '<li class="page-item">';
      s += '<a class="page-link" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);">Anterior</a></li>';
      return s;
  }

  function getItem(data, i) {
      if (data.current_page == i)
          s = '<li class="page-item active">';
      else
          s = '<li class="page-item">';
      s += '<a class="page-link" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);">' + i + '</a></li>';
      return s;
  }

  function montarPaginator(data) {

      $("#paginationNav>ul>li").remove();

      $("#paginationNav>ul").append(
          getPreviousItem(data)
      );

      n = 10;
      if (data.last_page > 10) {
          if (data.current_page - n / 2 <= 1)
              inicio = 1;
          else if (data.last_page - data.current_page < n)
              inicio = data.last_page - n + 1;
          else
              inicio = data.current_page - n / 2;

          fim = inicio + n - 1;
      } else{
          inicio = 1;
          fim = data.last_page;
      }
      for (i = inicio; i <= fim; i++) {
          $("#paginationNav>ul").append(
              getItem(data, i)
          );
      }
      $("#paginationNav>ul").append(
          getNextItem(data)
      );
  }

  function montarLinha(dados) {
      var linha = "<tr>" +
          "<td>" + dados.idAgenda + "</td>" +
          "<td>" + dados.Descricao + "</td>" +
          "<td class='text-center'>" +
          '<a rel="tooltip" class="btn btn-success btn-link" onclick="editar(' + dados.idAgenda + ')" data-original-title="" title="">' +
          '<i class="material-icons">edit</i>' +
          '<div class="ripple-container"></div>' +
          '</a>' +
          '<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="remover(' + dados.idAgenda + ')">' +
          '<i class="material-icons">close</i>' +
          '<div class="ripple-container"></div>' +
          '</button>' +


          "</td>" +
          "</tr>";
      return linha;
  }

  function montarTabela(data) {
      $("#tabelaView>tbody>tr").remove();
      for (i = 0; i < data.data.length; i++) {
          $("#tabelaView>tbody").append(
              montarLinha(data.data[i])
          );
      }
  }

  function carregar(pagina) {
      $.getJSON('/api/secretaria/agendas', {page: pagina}, function (resp) {
          montarTabela(resp);
          montarPaginator(resp);
          $("#paginationNav>ul>li>a").click(function () {
              carregar($(this).attr('pagina'));
          })
      });
  }

  function carregarPesquisa(pagina) {
      $.getJSON('/api/secretaria/secretaria_agendasPesquisa/' + $('#Pesquisa-texto').val() + '/0', {page: pagina}, function (resp) {
          montarTabela(resp);
          montarPaginator(resp);
          $("#paginationNav>ul>li>a").click(function () {
              carregar($(this).attr('pagina'));
          })
      });
  }

  function limparPesquisa(pagina) {
      $('#Pesquisa-texto').val('');
      carregar();
  }

  $(function () {
      carregar();
  })

  function mostraDialogo(mensagem, tipo, tempo){

      // se houver outro alert desse sendo exibido, cancela essa requisição
      if($("#message").is(":visible")){
          return false;
      }

      // se não setar o tempo, o padrão é 3 segundos
      if(!tempo){
          var tempo = 3000;
      }

      // se não setar o tipo, o padrão é alert-info
      if(!tipo){
          var tipo = "info";
      }

      // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
      var cssMessage = "display: block; position: fixed; top: 0; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
      var cssInner = "margin: 0 auto; box-shadow: 1px 1px 5px black;";

      // monta o html da mensagem com Bootstrap
      var dialogo = "";
      dialogo += '<div id="message" style="'+cssMessage+'">';
      dialogo += '    <div class="alert alert-'+tipo+' alert-dismissable" style="'+cssInner+'">';
      dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
      dialogo +=          mensagem;
      dialogo += '    </div>';
      dialogo += '</div>';

      // adiciona ao body a mensagem com o efeito de fade
      $("body").append(dialogo);
      $("#message").hide();
      $("#message").fadeIn(200);

      // contador de tempo para a mensagem sumir
      setTimeout(function() {
          $('#message').fadeOut(300, function(){
              $(this).remove();
          });
      }, tempo); // milliseconds

  }

</script>
@endsection