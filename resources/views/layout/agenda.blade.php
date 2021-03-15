@extends('layout/agenda_v1')

@section('container-fluid', 'Agenda Médica')

@section('titulo', 'Agenda')

@section ('diretory', 'Agenda')

@section('autofalante','2')

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
<!-- Main content -->
<div class="row">
	<div class="col-md-3">
		<div class="sticky-top mb-3">

              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Selecionar Agenda Médica</h3>
                      
                  </div>
                    <div class="form-group">
                      <div class="col">
                       <label for="fk_medico"></label>
                          <div class="input-group">
                            <select id="id_medico" name="id_medico" onchange="SelecionarMedico(value);" class="form-control">
                             <option value="" selected>Selecionar....</option>
                            </select>
                          </div>
                      </div>
                    </div>
                </div>

		  <div class="card">
			<div class="card-header">
			  <h3 class="card-title">Criar Encaixe</h3>
			</div>
			<div class="card-body">
			  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
				<!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
				<ul class="fc-color-picker" id="color-chooser">
				  <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
				  <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>				  
				  <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>				  
				</ul>
			  </div>
			  <!-- /btn-group -->
        <div class="input-group">
				
        <input id="id_paciente_encaixe" type="search" class="form-control form-control-navbar" placeholder="Paciente / fone / obs." aria-label="search" >
				  
          <div class="input-group-append">
					<button class="btn btn-sm btn-success" type="button" id="add-id_paciente_encaixe" >Criar</button>
				  </div>
				<!-- /btn-group -->
			  </div>
			  <!-- /input-group -->
			</div>
		  </div>


		  <div class="card">
			<div class="card-header">
			  <h4 class="card-title">Pacientes Aguardando Encaixe</h4>
			</div>
			<div class="card-body">
			  <!-- the events -->
			  <div id="external-events">

				
				</div>
        <div class="checkbox">
				  <label for="drop-remove">
					<input type="checkbox" type="" id="drop-remove" value="4" checked>
					Remover aut.
				  </label>
				
			  </div>
			</div>
			<!-- /.card-body -->
		  </div>
		  <!-- /.card -->
      </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
      <div class="card card-primary">
        <div class="card-body p-0">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


<!-- modal para visualizar agendamento -->
<div class="modal fade" id="ModalAgendamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal">
          </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="visagendamentos">
              <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9" id="idcons"></dd>

                <dt class="col-sm-3">Observação</dt>
                <dd class="col-sm-9" id="observacaocons"></dd>

                <dt class="col-sm-3">Paciente</dt>
                <dd class="col-sm-9" id="id_pacientecons"></dd>

                <dt class="col-sm-3">Inicio</dt>
                <dd class="col-sm-9" id="startcons"></dd>

                <dt class="col-sm-3">Fim</dt>
                <dd class="col-sm-9" id="endcons"></dd>
              </dl>  
                  <div class="modal-footer">
                    <button class="btn btn-sm btn-warning btn-canc-vis">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick= "remover()"> Apagar </button>
                    <button type="cancel" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
            </div>  
            <div class="formedit">
              <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Observação</label>
                  <div class="col-sm-10">
                    <input type="hidden" id="idconsultaa" class="form-control">
                    <input type="text" name="observacaoo" class="form-control" id="observacaoo" placeholder="Observação">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Paciente</label>
                  <div class="col-sm-10">                    
                    <input type="text" name="id_pacientee" class="form-control" id="id_pacientee" placeholder="Paciente">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Incio</label>
                  <div class="col-sm-10">
                    <input type="text" name="start" class="form-control" id="startconsultaa" placeholder="Incio" onkeypress="DataHora(event, this)">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Fim</label>
                  <div class="col-sm-10">
                    <input type="text" name="end"  class="form-control" id="endconsultaa" placeholder="Fim" onkeypress="DataHora(event, this)">
                  </div>
                </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                      <button type="button" class="btn btn-sm btn-secondary btn-canc-edi">Cancelar</button>
                    </div>
              </form>

            </div>
           
        </div>
    </div>
  </div>
</div>


  <!-- modal para criar agendamento -->
<div class="modal fade" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal_cad">
          </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        <div class="form-group row">          
            <label for="fk_paciente" class="control-label">Paciente</label>             
            <div class="input-group">
                <select id="id_paciente" class="id_paciente form-control" style="width:100%;" name="id_paciente">
                </select>          
            </div>              
         </div>
			    <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Observação</label>
            <div class="col-sm-10">
              <input type="hidden" id="idconsulta" class="form-control">
              <textarea class="form-control" id="observacao" name="observacao" placeholder="Observação"></textarea>    
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Incio</label>
            <div class="col-sm-10">
              <input type="text" name="start" class="form-control" id="startconsulta" placeholder="Incio" onkeypress="DataHora(event, this)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Fim</label>
            <div class="col-sm-10">
              <input type="text" name="end"  class="form-control" id="endconsulta" placeholder="Fim" onkeypress="DataHora(event, this)">
            </div>
          </div>
          <div class="modal-footer">
              <div class="col" style="width:100%;">
                <a class="btn btn-sm btn-success" href="/pacientes" target="_blank" role="button">Cadastro de Pacientes</a>
              </div>
              <div class="col-0">
                <button type="submit" class="btn btn-sm btn-primary">Salvar Agendamento</button>
                <button type="cancel" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- modal para criar agendamento a partir de um encaixe-->
<div class="modal fade" id="ModalEncaixe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal_enc">
          </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        	<div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Paciente Encaixe</label>
            <div class="col-sm-5"  style="right: 66px;">              
              <input type="text" name="encaixe_agen" class="form-control" id="encaixe_agen" readonly>              
            </div>
          </div>
<div class="modal-footer">
</div>
        <div class="form-group row">          
            <label for="fk_paciente" class="control-label">Paciente Agendamento</label>             
            <div class="input-group">
                <select id="id_paciente_agen" class="id_paciente_agen form-control" style="width:100%;" name="id_paciente_agen">
                </select>          
            </div>              
         </div>
			    <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Observação</label>
            <div class="col-sm-10">
              <input type="hidden" id="idencaixe" class="form-control">
              <textarea class="form-control" id="observacao_encaixe" name="observacao_encaixe" placeholder="Observação"></textarea>    
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Incio</label>
            <div class="col-sm-10">
              <input type="text" name="startconsulta_encaixe" class="form-control" id="startconsulta_encaixe" placeholder="Incio" onkeypress="DataHora(event, this)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Fim</label>
            <div class="col-sm-10">
              <input type="text" name="endconsulta_encaixe"  class="form-control" id="endconsulta_encaixe" placeholder="Fim" onkeypress="DataHora(event, this)">
            </div>
          </div>
          <div class="modal-footer">
              <div class="col" style="width:100%;">
                <a class="btn btn-sm btn-success" href="/pacientes" target="_blank" role="button">Cadastro de Pacientes</a>
              </div>
              <div class="col-0">
                <button type="submit" class="btn btn-sm btn-primary">Salvar Agendamento</button>
                <button type="cancel" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

</script>

<!-- jQuery -->
<script src="/vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap problema-->
<script src="/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="/vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App problema-->
<script src="/vendor/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/vendor/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->

<script>let objCalendar;</script> 


<script src="/vendor/plugins/moment/moment.min.js"></script>
<script src="/vendor/plugins/fullcalendar/main.min.js"></script>
<script src="/vendor/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="/vendor/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="/vendor/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="/vendor/plugins/fullcalendar-bootstrap/main.min.js"></script>
<script src="/vendor/plugins/fullcalendar/locales/pt-br.js"></script>
<!-- Toastr -->
<script src="/vendor/plugins/toastr/toastr.min.js"></script>  
<script src="{{ asset('select2') }}/js/select2.min.js"></script>
<script src="{{ asset('select2') }}/js/i18n/pt-BR.js"></script>


</script>

<script>

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  $(function() {
  $('.toastsDefaultWarning').click(function() {
    $(document).Toasts('create', {
      class: 'bg-warning', 
      title: 'Orientações para Agendamento Imediato',
       subtitle: 'Orientações',
      body: 'Utilize a opção "Criar Agendamento emidiato" quando o horário desejado estiver disponivel.'
      
    })
  });

  $('.toastsDefaultWarning').click(function() {
    $(document).Toasts('create', {
      class: 'bg-warning', 
      title: 'Orientações para Encaixe',
       subtitle: 'Orientações',
      body: 'Utilize a opção "Criar Agendamento emidiato" quando o horário desejado estiver disponivel.'
      
    })
  });
});
 
  $(function () {

    /* inicializar os eventos externos
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // criar um objeto de evento (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // não precisa ter um começo ou fim
        var eventObject = {
          title: $.trim($(this).text()) //  use o texto do elemento como o título do evento
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    };

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        // console.log(eventEl);
        console.log('Evento levantado');
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });      

    var calendar = new Calendar(calendarEl, {
      locale: 'pt-br',
      eventLimit : true,
      selectable: true,
      navLinks: true,
      extraParams: function(){
        return{
          cachebuster: new Date().valueOf()
        };
      },
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',

      eventDrop: function(event){ // adicionar acao ao arrastar um evento - update
      alert('event drop');
      },
      
      eventResize: function(event){ // adicionar acao ao mudar o tamanho do evento - update
        alert('event Resize');
      },


      
      //events : '/agendamentos/box/'+ 2,

      //minTime: "06:00", // HORARIO MINIMO PARA AGENDAMENTO
      //maxTime: "19:00", // HORARIO MAXIMO PARA AGENDAMENTO
      hiddenDays: [ 0 ], // OCULTAR O DOMINGO DA AGENDA
      slotDuration: '00:30:00', // DURACAO PADRAO DOS AGENDAMENTOS
      
      

      eventClick: function(info) {
      info.jsEvent.preventDefault();
      
        
        $("#title_modal").html("Agendamento " + info.event.id);
        console.log(info.event._def.extendedProps.observacao);

        $('#ModalAgendamento #idcons').text(info.event.id);
        $('#ModalAgendamento #idconsultaa').val(info.event.id);
        $('#ModalAgendamento #observacaocons').text(info.event._def.extendedProps.observacao);
        $('#ModalAgendamento #observacaoo').val(info.event._def.extendedProps.observacao);
        $('#ModalAgendamento #id_pacientecons').text(info.event.title);      
        $('#ModalAgendamento #id_pacientee').val(info.event.title);
        $('#ModalAgendamento #startcons').text(info.event.start.toLocaleString());
        $('#ModalAgendamento #startconsultaa').val(info.event.start.toLocaleString());
        $('#ModalAgendamento #endcons').text(info.event.end.toLocaleString());
        $('#ModalAgendamento #endconsultaa').val(info.event.end.toLocaleString());

        $('#ModalAgendamento').modal('show');
        
      },
      select: function(info) {
        // alert('selected ' + info.start.toLocaleString() + '  to  ' + info.end.toLocaleString());
        $('#ModalCadastro #startconsulta').val(info.start.toLocaleString());
        $('#ModalCadastro #endconsulta').val(info.end.toLocaleString());
        $("#title_modal_cad").html("Criar novo Agendamento");
        $('#ModalCadastro').modal('show');
        
      },

      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        console.log('remover sem retirar');
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {          
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
          
        }

        var id_encaixe = info.draggedEl.id;
        var pac = info.draggedEl.outerText;
        var dati = info.date.toLocaleString();
        var datf = info.date.toLocaleString('pt-Br',{ dateStyle: 'short' });

        $('#ModalEncaixe').modal('show');
        $("#title_modal_enc").html("Criação de Agendamento - Encaixe: " + id_encaixe);

        $('#ModalEncaixe #encaixe_agen').val(pac);
        $('#ModalEncaixe #idencaixe').val(id_encaixe);
        $('#ModalEncaixe #startconsulta_encaixe').val(dati);
        $('#ModalEncaixe #endconsulta_encaixe').val(datf);
        
        
      }
      
    });
    
   // objEvents = events;
    
    objCalendar = calendar;    
    
    
   
    calendar.render();
    // $("#calendar").fullCalendar();

    /* ADDING EVENTS */
    var currColor = 'rgb(25, 105, 44)' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      console.log('selecionando cor');
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      
      //Add color effect to button
      $('#add-id_paciente_encaixe').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-id_paciente_encaixe').click(function (e) {
            objeto = {
              paciente: $('#id_paciente_encaixe').val(),
              id_medico: $('#id_medico').val(),
              color: currColor 
            };
            $.ajax({
                type: "POST",
                url: "/api/agenda_encaixe",
                context: this,
                data: objeto,
                success: function (data) {
                    objeto = JSON.parse(data);
                    console.log(objeto.color);
                    
                    //Create events
                    var event = $('<div  />')
                    
                    event.css({
                      'background-color': objeto.color,
                      'border-color'    : objeto.color,
                      'color'           : '#fff'
                    }).addClass('external-event')
                    event.html(objeto.paciente)
                    $('#external-events').prepend(event)

                    //Add draggable funtionality
                    ini_events(event)
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

      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#id_paciente_encaixe').val()
      if (val.length == 0) {
        return
      }



      //Remove event from text input
      $('#id_paciente_encaixe').val('')
    })
  });
  

   
  function montarTabela(data) {    
    $('#external-events>div').remove();          
    $med = data;
    
    $.getJSON('/agenda_encaixe/'+ $med, function(data){
        for(i=0;i<data.length;i++){            
            //Create events            
            var event = $('<div  ' + 'id="'+ data[i].id +'"/>')            
            
            event.css({
              'background-color': data[i].color,
              'border-color'    : data[i].color,
              'color'           : '#fff'
            }).addClass('external-event')
                event.html(data[i].paciente)
                $('#external-events').prepend(event)

             //Add draggable funtionality
             //ini_events(event)          
        }
    });
  }

  function DataHora (evento, objeto){
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00'){
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)){
      if (campo.value.length == conjunto1)
        campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto2)
        campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto3)
        campo.value = campo.value + separacao2;
      else if (campo.value.length == conjunto4)
        campo.value = campo.value + separacao3;
      else if (campo.value.length == conjunto5)
        campo.value = campo.value + separacao3;
    } else {
      event.returnValue = false;
    }
  };

  function salvarAgendamento() {
    agen = {
      id: $("#idconsultaa").val(),
      title: $("#titleconsultaa").val(),
      start: $("#startconsultaa").val(),
      end: $("#endconsultaa").val()
    };
    $.ajax({
      type: "PUT",
      url: "api/agendamentos/"+ agen.id,
      context: this,
      data: agen,
      success: function(data) {
        $("#ModalAgendamento").modal('hide');
        objCalendar.refetchEvents();
        //location.reload();
        agen = JSON.parse(data);
       
        
      },
      error: function(error) {
        console.log(error);
      }
    });
  };

    function salvarAgendamentoEncaixe() {
    agen = {
      id:    $('#ModalEncaixe #idencaixe').val(),
      start: $('#ModalEncaixe #startconsulta_encaixe').val(),
      end:   $('#ModalEncaixe #endconsulta_encaixe').val(),
      id_paciente:    $('#ModalEncaixe #id_paciente_agen').val(),
      id_medico: $('#id_medico').val(),
      observacao:    $('#ModalEncaixe #observacao_encaixe').val()
    };
    $.ajax({
      type: "PUT",
      url: "api/agenda_encaixe/"+ agen.id,
      context: this,
      data: agen,
      success: function(data) {
        
        $("#ModalEncaixe").modal('hide');
        //objCalendar.refetchEvents();        
        //agen = JSON.parse(data);               
      },
      error: function(error) {
        console.log(error);
      }
    });
  };


  $("#ModalEncaixe").submit( function(event){
    event.preventDefault();
    salvarAgendamentoEncaixe();
    //$("#ModalCadastro").modal('hide');
  });


  $("#ModalAgendamento").submit( function(event){
    event.preventDefault();
    salvarAgendamento();
    //$("#ModalCadastro").modal('hide');
  });

  function criarAgendamento(){
    agen = {
      observacao: $("#observacaoo").val(),
      start: $("#startconsulta").val(),
      end: $("#endconsulta").val(),
      id_medico: $('#id_medico').val(),
      id_paciente: $('#id_paciente').val()
    },
        $.post("/api/agendamentos", agen, function(data) {
          console.log(data);
          objCalendar.refetchEvents();
          agendamentos = JSON.parse(data);
        });
        $("#ModalCadastro").modal('hide');
  };

  $("#ModalCadastro").submit( function(event){
    event.preventDefault();
    criarAgendamento();
    //$("#ModalCadastro").modal('hide');
  });

  $('.btn-canc-vis').on("click", function(){
    $('.visagendamentos').slideToggle();
    $('.formedit').slideToggle();
  });

  $('.btn-canc-edi').on("click", function(){
    $('.formedit').slideToggle();
    $('.visagendamentos').slideToggle();
  });

  function remover(id){
    agen = {
      id: $("#idconsultaa").val()
    },
    $.ajax({
      type: "DELETE",
      url: "/api/agendamentos/" + agen.id,
      context: this,
      success: function() {
        $("#ModalAgendamento").modal('hide');
        console.log('OK - Registro apagado');
         
         objCalendar.refetchEvents();
         //location.reload();

      },
      error: function(error) {
        console.log(error);
      }
    });
  };
    
   function SelecionarMedico($i) {
    //console.log('chamou o selecionar medico');
    // $("#calendar>div>div>table>tbody>tr>td>div>div>div>div>table>tbody>tr>td>a").remove();
    var count = 0;
    while ( count <= 99 ) {
	  var event = objCalendar.getEventById(count)
    if (event){
        event.remove();  
      };
        count++;
    } 
    return SelecionarMedico_Add($i);
  };

  function SelecionarMedico_Add($i){
    //console.log('chamou o teste' +$i);
    var url_med = '/agendamentos/box/'+ $i;   
    var event = objCalendar.addEventSource (url_med);
    return montarTabela($i);
  };


function SelecionarPacienteEncaixe(){
       $('#id_paciente_agen').select2({
         placeholder: 'Pesquisar Paciente',
         minimumInputLength: 3,
         ajax: {
            url: "{{ route('profissional_autocomplete_cliente.fetch') }}",
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
      SelecionarPacienteEncaixe();
  });

function SelecionarPaciente(){
       $('#id_paciente').select2({
         placeholder: 'Pesquisar Paciente',
         minimumInputLength: 3,
         ajax: {
            url: "{{ route('profissional_autocomplete_cliente.fetch') }}",
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
      SelecionarPaciente();
  });


  function carregarMedicos(){
    $.getJSON('/medicos/box', function(data){
        for(i=0;i<data.length;i++){
          opcao = '<option value ="' + data[i].id + '">' +
            data[i].nome + '</option>';
          $('#id_medico').append(opcao);
        }
    });
  };

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

        };
  
  $(function(){
    carregarMedicos();
  });

  $(document).ready(function () {
            carregarusuario();
        });

            function carregarusuario() { // carregar usuario logado no sistema
            $.getJSON('/user', function(data){

                    var linha = '<span class="avatar avatar-sm rounded-circle">'+ data.name +
                                ' <i class="fas fa-user"></i>'+
                                '</span>'+
                                '<div class="media-body  ml-2  d-none d-lg-block">'+
                                '<span class="mb-0 text-sm  font-weight-bold"></span>'+
                                '</div>';
                    
                        $('#usuario').append(linha);      

                });
            }

@endsection