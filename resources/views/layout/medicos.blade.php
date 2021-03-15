@extends('layout/base')

@section('container-fluid', 'Profissionais de Saúde Cadastrados')

@section('titulo', 'Profissional Saúde')

@section ('diretory', 'Profissional de Saúde')

@section('body')

<div class="card border">
   
  <table class="table table-ordered table-hover" id="tabelaMedicos">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Conselho</th>
                    <th>Nome</th>
                    <th>Especialide</th>
                    <th>Sexo</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
         </thead>
            <tbody>
                             
            </tbody>
  </table>    
       
        <div class="card-footer">
            <div class="form-row">
              <div class="col">
                <button role="button" class= "btn btn-sm btn-primary" onClick="novoMedico()">Novo Prof. Saúde</a></button>
              </div>
              <div class="col">
                <nav id="paginator">          
                  <ul class="pagination pagination-sm justify-content-end">
                                  
                  </ul>
                </nav>
              </div>
            </div>
         </div>      
</div>
  
  <div class="modal fade bd-example-modal-lg" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
          <div class="modal-header">
              <h5 class="modal-title" id="title_modal">
                </h5> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">Ficha Cadastral</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Configuração de Agenda</a>
              </li>  
            </ul>
            
            <div class="modal-body">
               <div class="form-group" >
                  <form>
                    <div class="form-row">                    
                      <div class="col">
                        <input type="hidden" id="id_medico" class="form-control">
                        <label for="nomeConvenio">Nome</label>
                        <input id="nome" type="text" class="form-control" placeholder="Nome Completo">
                      </div>
                      <div class="col-2">
                        <label for="Sexo">Sexo</label>
                        <select class="form-control" id="sexo">
                          <option value="" disabled selected>Escolher...</option>
                          <option value="F">Feminino</option>
                          <option value="M">Masculino</option>
                          <option value="O">Outros</option>
                        </select>
                      </div>
                      <div class="col-2">
                        <label for="nomeConvenio">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="00000000000">
                      </div>
                      <div class="col-3">
                        <label for="nomeConvenio">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
                      </div>
                    </div>
                  </form> 
                  </div>
                    <div class="form-group">
                      <form>
                        <div class="form-row">
                          <div class="col-2">
                            <label for="Conselho">Conselho</label>
                              <div class="input-group">
                                <select id="id_conselho" name="id_conselho" class="form-control"> 
                                </select>
                              </div>
                          </div>
                          <div class="col-2">
                            <label for="plano">Cod. Conselho</label>
                            <input type="text" class="form-control" name="conselho" id="conselho" placeholder="Conselho">
                          </div>

                          <div class="col-3">
                            <label for="especialidade">Especialidade</label>
                              <div class="input-group">
                                <select id="id_especialidade" name="id_especialidade" class="form-control">
                                </select>
                              </div>
                          </div>

                            <div class="col-4">
                              <label for="perfil">Perfil</label>
                                <div class="input-group">
                                  <select id="id_perfil" name="id_perfil" class="form-control">
                                  </select>
                                </div>
                            </div>

                        </div>
                      </form> 
                      </div>
  
                      <div class="form-group">
                        <form>
                          <div class="form-row">
                            <div class="col-3">
                              <label for="celular">Celular</label>
                              <input type="tel" class="form-control" name="celular" id="celular" placeholder="(99) 99999 - 9999">
                            </div>
                            <div class="col-3">
                              <label for="telefone">Telefone</label>
                              <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(99) 9999 - 9999">
                            </div>
                            <div class="col-4">
                              <label for="email">E-Mail</label>
                              <input type="text" class="form-control" name='email' id="email" placeholder="exemplo@exemplo.com.br">
                              </select>
                            </div>
                          </div>
                        </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                      <button type="cancel" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                   </form> 
           </div>        
        </div>
      </div>
    </div>

  
  @endsection
  
  @section('script')
  
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });
  
  function carregarConselhos(){
    $.getJSON('/conselhos/box', function(data){
        for(i=0;i<data.length;i++){
          opcao = '<option value ="' + data[i].id + '">' +
            data[i].name + '</option>';
          $('#id_conselho').append(opcao);
        }
    });
  }
  
  $(function(){
    carregarConselhos();
  })

  function carregarEspecialidades(){
    $.getJSON('/especialidades/box', function(data){
        for(i=0;i<data.length;i++){
          opcao = '<option value ="' + data[i].id + '">' +
            data[i].name + '</option>';
          $('#id_especialidade').append(opcao);
        }
    });
  }
  
  $(function(){
    carregarEspecialidades();
  })
  
  function carregarPerfis(){
    $.getJSON('/perfis/box', function(data){
        for(i=0;i<data.length;i++){
          opcao = '<option value ="' + data[i].id + '">' +
            data[i].name + '</option>';
          $('#id_perfil').append(opcao);
        }
    });
  }
  
  $(function(){
    carregarPerfis();
  })
  
  function novoMedico() {
    $('#id_medico').val('');
    $('#nome').val('');
    $('#sexo').val('');
    $('#cpf').val('');
    $('#data_nascimento').val('');
    $('#id_conselho').val('');
    $('#conselho').val('');
    $('#id_especialidade').val('');
    $('#id_perfil').val('');
    $('#celular').val('');
    $('#telefone').val('');
    $('#email').val('');
    $('#ModalCadastro').modal('show');
    $("#title_modal").html("Cadastrar novo Profissional de Saúde");
  }
  
  function montarLinha(p){
    var linha = "<tr>"+
      "<td>" + p.id + "</td>" +
      "<td>" + p.conselho + "</td>"+
      "<td>" + p.nome + "</td>"+
      "<td>" + p.id_especialidade + "</td>"+
      "<td>" + p.sexo + "</td>"+
      "<td>" + p.celular + "</td>"+
      "<td>" +
        '<button class="btn btn-sm btn-secondary" onclick= "editar(' + p.id+')">Config. Agenda</button> ' +
        '<button class="btn btn-sm btn-primary" onclick= "editar(' + p.id+')"> Editar </button> ' +
        '<button class="btn btn-sm btn-danger" onclick= "remover(' + p.id+')"> Apagar </button> ' +
      "</td>"+
      "</tr>";
      return linha;
  }
  function editar(id){
    $.getJSON('/api/medicos/'+id, function(data){
      $("#ModalCadastro").modal('show');
      $("#title_modal").html("Editar Profissional de Saúde " + data.id);
      $("#id_medico").val(data.id);
      $("#nome").val(data.nome);
      $("#sexo").val(data.sexo);
      $("#cpf").val(data.cpf);
      $("#id_conselho").val(data.id_conselho);
      $("#id_perfil").val(data.id_perfil);
      $("#conselho").val(data.conselho);
      $("#id_especialidade").val(data.id_especialidade);
      $("#data_nascimento").val(data.data_nascimento);
      $("#celular").val(data.celular);
      $("#telefone").val(data.telefone);
      $("#email").val(data.email);
  
  });
  }
  
        function remover(id){
          var confirmado = confirm('Deseja realmente excluir o Profissional de Saúde selecionado? Esta operação não pode ser desfeita!');
          if(confirmado){          
            return remover_c(id);          
          }else{
          //Apenas aborta r o processo.
          } 
        }

  function remover_c(id){
  $.ajax({
    type: "DELETE",
    url: "/api/medicos/" + id,
    context: this,
    success: function() {
      console.log('OK - Registro apagado');
      linhas = $("#tabelaMedicos>tbody>tr");
      e = linhas.filter(function (i, elemento) {
        return elemento.cells[0].textContent == id;
    });
    if (e)
        e.remove();
  
    },
    error: function(error) {
      console.log(error);
    }
  });
  }
  
  function getItemProximo(data){
  i = data.current_page + 1;
  if(data.last_page == data.current_page)
    s = '<li class="page-item disabled"> ';
  else 
    s = '<li class="page-item"> ';
  s += '<a class="page-link" ' + ' pagina="'+ i +'" '+' href="#">Próximo</a></li>';
  return s;
  }
  
  function getItemAnterior(data){
  i = data.current_page - 1;
  if(data.current_page == 1)
    s = '<li class="page-item disabled"> ';
  else 
    s = '<li class="page-item"> ';
  s += '<a class="page-link" ' + ' pagina="'+ i +'" '+' href="#">Anterior</a></li>';
  return s;
  }
  
  function getItem(data, i){
  if(data.current_page == i)
    s = '<li class="page-item active"> ';
  else 
    s = '<li class="page-item"> ';
  s += '<a class="page-link" ' + ' pagina="'+ i +'" '+' href="#"> ' + i + '</a></li>';
  return s;
  }
  
  function montarPaginator(data){
  $('#paginator>ul>li').remove();
  $('#paginator>ul').append(getItemAnterior(data));
  
  n = 10; //quantidade de pag por vez
  if (data.last_page > 10) {
      if (data.current_page - n/2 <= 1)
          inicio = 1;
      else if (data.last_page - data.current_page < n)
          inicio = data.last_page - n + 1;
      else
          inicio = data.current_page - n / 2;
  
      fim = inicio + n - 1;
  } else{
      inicio = 1;
      fim = data.last_page + 1;
  }
  
  for(i=inicio;i<fim;i++){           
    $('#paginator>ul').append(getItem(data, i));
  }
  
  $('#paginator>ul').append(getItemProximo(data));
  }
  
  
  function montarTabela(data) {
  $('#tabelaMedicos>tbody>tr').remove();
  for(i=0;i<data.data.length; i++){
      s = montarLinha(data.data[i]);
      $('#tabelaMedicos>tbody').append(s);
  }
  }
  
  function carregarMedicos(pagina){
    $.getJSON('api/medicos', {page: pagina}, function(resp){          
      montarTabela(resp);
      montarPaginator(resp);
      $("#paginator>ul>li>a").click(function(){
            carregarMedicos( $(this).attr('pagina') ); 
      });
      //for(i=0;i<convenios.length;i++){
         // linha = montarLinha(convenios[i]);
          //$('#tabelaConvenios>tbody').append(linha);
      //}
    });
  
  }
  
 function criarMedico(){  
            objeto = {
                  nome: $("#nome").val(),
                  sexo: $("#sexo").val(),
                  cpf: $("#cpf").val(),
                  data_nascimento: $("#data_nascimento").val(),
                  id_conselho: $("#id_conselho").val(),
                  conselho: $("#conselho").val(),
                  id_especialidade: $("#id_especialidade").val(),
                  id_perfil: $("#id_perfil").val(),
                  celular: $("#celular").val(),
                  telefone: $("#telefone").val(),
                  email: $("#email").val()  
            };
            $.ajax({
                type: "POST",
                url: "/api/medicos",
                context: this,
                data: objeto,
                success: function (data) {
                    objeto = JSON.parse(data);
                    linha = montarLinha(objeto);
                    $('#tabelaMedicos>tbody').append(linha);
                    $("#ModalCadastro").modal('hide');
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
  
  function salvarMedico() {
    medi = {
      id: $('#id_medico').val(),
      nome: $("#nome").val(),
      sexo: $("#sexo").val(),
      cpf: $("#cpf").val(),
      data_nascimento: $("#data_nascimento").val(),
      id_conselho: $("#id_conselho").val(),
      conselho: $("#conselho").val(),
      id_especialidade: $("#id_especialidade").val(),
      id_perfil: $("#id_perfil").val(),
      celular: $("#celular").val(),
      telefone: $("#telefone").val(),
      email: $("#email").val()
    };
    $.ajax({
      type: "PUT",
      url: "api/medicos/"+ medi.id,
      context: this,
      data: medi,
      success: function(data) {
        medi = JSON.parse(data);
        linhas = $("#tabelaMedicos>tbody>tr");
        e = linhas.filter( function (i, e) {
          return (e.cells[0].textContent == medi.id);
        });
        if (e){
          e[0].cells[0].textContent = medi.id;
          e[0].cells[1].textContent = medi.conselho;
          e[0].cells[2].textContent = medi.nome;
          e[0].cells[3].textContent = medi.id_especialidade;
          e[0].cells[4].textContent = medi.sexo;
          e[0].cells[5].textContent = medi.celular;
        }
        $("#ModalCadastro").modal('hide');
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  function mostraDialogo(mensagem, tipo, tempo){

            // se houver outro alert desse sendo exibido, cancela essa requisição
            if($("#message").is(":visible")){
                return false;
            }

            // se não setar o tempo, o padrão é 3 segundos
            if(!tempo){
                var tempo = 4000;
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
                $('#message').fadeOut(400, function(){
                    $(this).remove();
                });
            }, tempo); // milliseconds

        }
  
  $("#ModalCadastro").submit( function(event){
    event.preventDefault();
    if ($("#id_medico").val() != '')   
       salvarMedico();
    else 
    
       criarMedico();  
    //$("#ModalCadastro").modal('hide');
  });
  
  $(function(){
    carregarMedicos(1);
  })

 
  @endsection