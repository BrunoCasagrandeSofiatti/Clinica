@extends('layout/base')

@section('container-fluid', 'Usuários Cadastrados')

@section('titulo', 'Usuários')

@section ('diretory', 'Usuários')

@section('head')
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="/vendor/plugins/fullcalendar/main.min.css">
        <link rel="stylesheet" href="/vendor/plugins/fullcalendar-daygrid/main.min.css">
        <link rel="stylesheet" href="/vendor/plugins/fullcalendar-timegrid/main.min.css">
        <link rel="stylesheet" href="/vendor/plugins/fullcalendar-bootstrap/main.min.css">
        <link rel="stylesheet" href="/vendor/plugins/personalizado/personalizado.css">

        
        <link href="{{ asset('select2') }}/css/select2.min.css" rel="stylesheet"/>
        

        <!-- Theme style -->
        <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
@endsection

@section('body')

<div class="card border">
   
  <table class="table table-ordered table-hover" id="tabelaUsuarios">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
         </thead>
            <tbody>
                             
            </tbody>
  </table>    
       
        <div class="card-footer">
            <div class="form-row">
              <div class="col">
                <button role="button" class= "btn btn-sm btn-primary" onClick="novousuário()">Novo Usuário</a></button>
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
  
  

<div class="modal fade" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal">
          </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cadastro Básico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vincular a um Indivíduo</a>
            </li>            
          </ul>
          <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="modal-body">
        <form>
          <div class="input-group mb-3">
            <input type="hidden" id="id_user" class="form-control">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome completo" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user "></span>
                </div>
            </div>
          </div>

        
        <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope "></span>
                </div>
            </div>
        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock "></span>
                </div>
            </div>
        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repita a senha">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock "></span>
                </div>
            </div>
        </div>
        <div class="card-footer" id="erros">
         
        </div>

              
          <div class="modal-footer">
          <button type="submit" class="btn btn-block btn-flat btn-primary">
            <span class="fas fa-user-plus"></span>
            Registrar
          </button>

          </div>
        </form>
      </div>
    </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="modal-body">
        <div class="form-group" >
          <form>
            <div class="form-row">   
              <div class="col">    
                <div class="form-group">
                  <div class="col-6">
                    <label for="perfil">Selecionar o Perfil de Acesso</label>
                      <div class="input-group">
                        <select id="id_perfil" name="id_perfil" onchange="SelecionarPerfil(value);" class="form-control">
                          <option value="" selected>Selecionar....</option>
                        </select>      
                      </div>
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="col-7" id="pesquisar"></div>                               
                  </div>
                </div>                
              </div>
            </div>
          </form)
        </div>         
    </div>
  </div>


  @endsection
  
  @section('script')

  </script>

<script src="{{ asset('select2') }}/js/select2.min.js"></script>
<script src="{{ asset('select2') }}/js/i18n/pt-BR.js"></script>

<script>
  
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  function SelecionarPerfil($i){

    $('#pesquisar>label').remove();
    $('#pesquisar>div').remove();

    return SelecionarPerfil_add($i);
  };
 

  function SelecionarPerfil_add($i) {

    if ($i == 1){ 
      var linha = '<label for="fk_individuo" class="control-label">Selecionar Secretaria</label>'+
      '<div class="input-group">'+
      '<select id="id_individuo" class="id_individuo form-control" style="width:100%;" name="id_individuo">'+
      '</select>';
      
      $('#pesquisar').append(linha);  
      return SelecionarAtendente();
    };

    if ($i == 2){ 
      var linha = '<label for="fk_individuo" class="control-label">Selecionar Médico</label>'+
      '<div class="input-group">'+
      '<select id="id_individuo" class="id_individuo form-control" style="width:100%;" name="id_individuo">'+
      '</select>';
      
      $('#pesquisar').append(linha);  
      return SelecionarMedico();
    };

  };


  function SelecionarMedico(){
       $('#id_individuo').select2({
         placeholder: 'Pesquisar Medico',
         minimumInputLength: 3,
         ajax: {
            url: "{{ route('profissional_autocomplete_medico.fetch') }}",
             dataType: 'json',                    
             delay: 250,
             processResults: function (data) {

                 return {
                     results: $.map(data, function (item) {

                         return {                                    
                             id: item.id,
                             text: item.nome

                         };
                     })
                 };
             }
         }
     });
};

function SelecionarAtendente(){
       $('#id_individuo').select2({
         placeholder: 'Pesquisar Secretária',
         minimumInputLength: 3,
         ajax: {
            url: "{{ route('profissional_autocomplete_atendente.fetch') }}",
             dataType: 'json',                    
             delay: 250,
             processResults: function (data) {

                 return {
                     results: $.map(data, function (item) {

                         return {                                    
                             id: item.id,
                             text: item.nome

                         };
                     })
                 };
             }
         }
     });
};

  $(document).ready(function () {
      SelecionarMedico();
      SelecionarAtendente();
  });

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
  
  function novousuário() {
    $('#name').val('');
    $('#email').val('');    
    $('#password').val('');    
    $('#password_confirmation').val('');    
    
    $('#id_individuo').val('');
    $('#id_perfil').val('');

    $('#ModalCadastro').modal('show');
    $("#title_modal").html("Cadastrar novo Usuário");
  }
  
  function montarLinha(p){
    var linha = "<tr>"+
      "<td>" + p.id + "</td>" +      
      "<td>" + p.name + "</td>"+
      "<td>" + p.email + "</td>"+
      "<td>" + p.perfil + "</td>"+
      "<td>" +
        '<button class="btn btn-sm btn-secondary" onclick= "editar(' + p.id+')">Reenviar Senha</button> ' +
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
        var confirmado = confirm('Deseja realmente excluir o usuário selecionado? Esta operação não pode ser desfeita!');
        if(confirmado){          
          return remover_c(id);          
        }else{
         //Apenas abortar o processo.
        } 
   };


  function remover_c(id){    
  $.ajax({
    type: "DELETE",
    url: "/api/usuarios/" + id,
    context: this,
    success: function() {
      console.log('OK - Registro apagado');
      linhas = $("#tabelaUsuarios>tbody>tr");
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
  $('#tabelaUsuarios>tbody>tr').remove();
  for(i=0;i<data.data.length; i++){
      s = montarLinha(data.data[i]);
      $('#tabelaUsuarios>tbody').append(s);
  }
  }
  
  function carregarUsuarios(pagina){
    $.getJSON('api/usuarios', {page: pagina}, function(resp){          
      montarTabela(resp);
      montarPaginator(resp);
      $("#paginator>ul>li>a").click(function(){
            carregarUsuarios( $(this).attr('pagina') ); 
      });
      //for(i=0;i<convenios.length;i++){
         // linha = montarLinha(convenios[i]);
          //$('#tabelaConvenios>tbody').append(linha);
      //}
    });
  
  }

  function criarUsuario(){  
            objeto = {
                nome: $("#name").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                password_confirmation: $("#password_confirmation").val(),
                id_individuo: $("#id_individuo").val(),      
                id_perfil: $("#id_perfil").val()
            };
            $.ajax({
                type: "POST",
                url: "/api/usuarios",
                context: this,
                data: objeto,
                success: function (data) {
                    objeto = JSON.parse(data);
                    linha = montarLinha(objeto);
                    $('#tabelaUsuarios>tbody').append(linha);
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
  
  function salvarUsuario() {
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
        linhas = $("#tabelaUsuarios>tbody>tr");
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
  
  $("#ModalCadastro").submit( function(event){
    event.preventDefault();
    if ($("#id_user").val() != '')   
       salvarUsuario();
    else 
    
       criarUsuario();  
    //$("#ModalCadastro").modal('hide');
  });
  
  $(function(){
    carregarUsuarios(1);
  })
  
  @endsection