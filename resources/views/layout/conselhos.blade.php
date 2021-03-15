@extends('layout/base')

@section('container-fluid', 'Conselhos Cadastrados')

@section('titulo', 'Conselhos')

@section ('diretory', 'Conselhos')

@section('body')

    <div class="card border">
            <table class="table table-ordered table-hover" id="tabelaConselhos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Conselho</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>    
        <div class="card-footer">
          <div class="form-row">
            <div class="col">
              <button role="button" class= "btn btn-sm btn-primary" onClick="novoConselho()">Novo Conselho</a></button>
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
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="nameconselho" class="col-form-label">Nome do conselho</label>
                  <div class="imput-group">
                  <input type="hidden" id="idcons" class="form-control">
                  <input name="name" type="text" class="form-control" id="namecons" placeholder="Nome Conselho">
                 
                  </div>
                <label for="descicaoconselho" class="col-form-label">Descrição</label>
                  <div class="imput-group">
                    <input name="descricao" type="text" class="form-control" id="descricaocons" placeholder="Descrição">
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

        function novoConselho() {
          $('#idcons').val('');
          $('#namecons').val('');
          $('#descricaocons').val('');
          $('#ModalCadastro').modal('show');
          $("#title_modal").html("Cadastrar novo Conselho");
      }

        function montarLinha(c){
            var linha = "<tr>"+
              "<td>" + c.id + "</td>"+
              "<td>" + c.name + "</td>"+
              "<td>" + c.descricao + "</td>"+
              "<td>" +
                '<button class="btn btn-sm btn-primary" onclick= "editar(' + c.id+')"> Editar </button> ' +
                '<button class="btn btn-sm btn-danger" onclick= "remover(' + c.id+')"> Apagar </button> ' +
              "</td>"+
              "</tr>";
              return linha;
          }

          function editar(id){
              $.getJSON('/api/conselhos/'+id, function(data){
                $("#ModalCadastro").modal('show');
                $("#title_modal").html("Editar Especialidade " + data.id);
                $("#idcons").val(data.id);
                $("#namecons").val(data.name);
                $("#descricaocons").val(data.descricao);
                
            });
          }

        function remover(id){
          var confirmado = confirm('Deseja realmente excluir o Conselho selecionado? Esta operação não pode ser desfeita!');
          if(confirmado){          
            return remover_c(id);          
          }else{
          //Apenas abortar o processo.
          } 
        }

          function remover_c(id){
            $.ajax({
              type: "DELETE",
              url: "/api/conselhos/" + id,
              context: this,
              success: function() {
                console.log('OK - Registro apagado');
                linhas = $("#tabelaConselhos>tbody>tr");
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
            $('#tabelaConselhos>tbody>tr').remove();
            for(i=0;i<data.data.length; i++){
                s = montarLinha(data.data[i]);
                $('#tabelaConselhos>tbody').append(s);
            }
          }

          function carregarConselhos(pagina){
            $.getJSON('api/conselhos', {page: pagina}, function(resp){          
              montarTabela(resp);
              montarPaginator(resp);
              $("#paginator>ul>li>a").click(function(){
                 carregarConselhos( $(this).attr('pagina') ); 
              });
              //for(i=0;i<convenios.length;i++){
                 // linha = montarLinha(convenios[i]);
                  //$('#tabelaConvenios>tbody').append(linha);
              //}
            });

          }

           function criarConselho(){  
            objeto = {
              name: $("#namecons").val(),
              descricao: $("#descricaocons").val()
            };
            $.ajax({
                type: "POST",
                url: "/api/conselhos",
                context: this,
                data: objeto,
                success: function (data) {
                    objeto = JSON.parse(data);
                    linha = montarLinha(objeto);
                    $('#tabelaConselhos>tbody').append(linha);
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


          function salvarConselho() {
            cons = {
              id: $("#idcons").val(),
              name: $("#namecons").val(),
              descricao: $("#descricaocons").val()
            };
            $.ajax({
              type: "PUT",
              url: "api/conselhos/"+ cons.id,
              context: this,
              data: cons,
              success: function(data) {
                cons = JSON.parse(data);
                linhas = $("#tabelaConselhos>tbody>tr");
                e = linhas.filter( function (i, e) {
                  return ( e.cells[0].textContent == cons.id);
                });
                if (e){
                  e[0].cells[0].textContent = cons.id;
                  e[0].cells[1].textContent = cons.name;
                  e[0].cells[2].textContent = cons.descricao;
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
            if ($("#idcons").val() != '')
              salvarConselho();
            else 
              criarConselho();
            //$("#ModalCadastro").modal('hide');
          });

          $(function(){
            carregarConselhos(1);
          })

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

    @endsection
    