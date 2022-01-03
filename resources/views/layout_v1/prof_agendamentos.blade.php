@extends('layout_v1/prof_base')

@section('container-fluid', 'Agenda Médica')

@section('titulo', 'Agenda')

@section ('diretory', 'Agenda')

@section('autofalante','1')

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
	<div class="col-md-2">
		<div class="sticky-top mb-2">




		  <div class="card">
			<div class="card-header">
			  <h4 class="card-title">Status Agendamentos</h4>
			</div>
			<div class="card-body">
			  <!-- the events -->
			  <div id="external-events">
        <div class="external-event bg-primary">Aguardando</div>
				<div class="external-event bg-success">Realizado</div>
				<div class="external-event bg-warning">Cancelada</div>
		  </div>      
			</div>
			<!-- /.card-body -->
		  </div>
		  <!-- /.card -->
      </div>
      </div>
      <!-- /.col -->
      <div class="col-md-10">
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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal">
          </h5> 
        <button type="button" class="close" onclick="limparhistorico()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="visagendamentos">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Paciente</label>
                    <input type="hidden" id="idconsultaa" class="form-control">
                    <input type="hidden" id="color" value="#fce703" class="form-control">
                    <input type="text" class="form-control" id="id_pacientecons" placeholder="Email" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Observação</label>
                    <textarea class="form-control" id="observacaocons" name="observacaocons" placeholder="Observação" readonly></textarea>
                  </div>
                </div>                
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputCity">Data/Hora Inicial</label>
                    <input type="text" class="form-control" id="startcons" readonly>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputEstado">Data/Hora Final</label>
                    <input type="text" class="form-control" id="endcons" readonly>
                  </div>

                </div>
                
              </form>
              
                  <div class="modal-footer">
                    <button class="btn btn-sm btn-success btn-canc-vis" onclick="carregarhistorico()")>Iniciar Consulta</button>
                    <button class="btn btn-sm btn-warning" onclick= "cancelaragen()" data-dismiss="modal">Cancelar Consulta</button>
                  </div>
            </div>  
            <div class="formedit">
            <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  
                  <!-- Timelime example  -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- The time line -->
                      <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label" id="id_historico">
                         
                        </div>                         
                        <!-- /.timeline-label --> 
                        

                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        
                                                
                        <div>
                          <i class="fas fa-clock bg-gray"></i>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                       
                   
                </div>
                <!-- /.timeline -->

              </section>
              <!-- /.content -->

               <div class="card card-success">
               
              <div class="card-header">
                <h3 class="card-title">incluir Informações na Linha do Tempo do Paciente</h3>            
              </div>              
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">                    
                    <div class="col-sm-7">
                    <input type="hidden" id="id_consulta" class="form-control">
                      <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Incluir Informações</button>                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
              <div class="modal-footer">               
                      <button type="button" class="btn btn-sm btn-primary" onclick= "finalizarconsulta()">Finalizar Consulta</button>
                      <button type="button" class="btn btn-sm btn-secondary btn-canc-edi">Cancelar</button>
                    </div>
              </div>                  
            </div>           
        </div>
    </div>
  </div>
</div>



@endsection

@section('script')

</script>


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
      title: 'Orientações para Atendimento de Paciente',
       subtitle: 'Orientações',
      body: 'Para iniciar uma consulta basta selecionar com o mouse o paciente desejado no calendario médico.'
      
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
        console.log(eventEl);
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
      selectable: false,
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


      
     // events : '/agendamentos/box/'+ 2,

      minTime: "06:00", // HORARIO MINIMO PARA AGENDAMENTO
      maxTime: "19:00", // HORARIO MAXIMO PARA AGENDAMENTO
      hiddenDays: [ 0 ], // OCULTAR O DOMINGO DA AGENDA
      slotDuration: '00:30:00', // DURACAO PADRAO DOS AGENDAMENTOS
      
      

      eventClick: function(info) {
      info.jsEvent.preventDefault();
      
        
        $("#title_modal").html("Paciente:  " + info.event.title);

        $('#ModalAgendamento #idcons').val(info.event.id);
        $('#ModalAgendamento #idconsultaa').val(info.event.id);
        $('#ModalAgendamento #id_consulta').val(info.event.id);
        $('#ModalAgendamento #observacaocons').val(info.event._def.extendedProps.observacao);
        $('#ModalAgendamento #observacaoo').val(info.event._def.extendedProps.observacao);
        $('#ModalAgendamento #id_pacientecons').val(info.event.title);      
        $('#ModalAgendamento #id_pacientee').val(info.event.title);
        $('#ModalAgendamento #startcons').val(info.event.start.toLocaleString());
        $('#ModalAgendamento #startconsultaa').val(info.event.start.toLocaleString());
        $('#ModalAgendamento #endcons').val(info.event.end.toLocaleString());
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
      editable  : false,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
      
    });
    
   // objEvents = events;
    
    objCalendar = calendar;    
    
    
   
    calendar.render();
    // $("#calendar").fullCalendar();

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  });

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

  function finalizarconsulta(id){
    valida = $('#descricao').val();
    if(valida != ''){
       var confirmado = confirm('Existem históricos não salvos para este paciente, deseja mesmo prosseguir sem salvar?');
        if(confirmado){       
          $('#descricao').val('');
          return finalizarconsulta_s(id);          
        }else{
         //Apenas abortar o processo.
        } 
    }
    return finalizarconsulta_s(id);
  };

function finalizarconsulta_s(id){
    agen = {
      id: $("#idconsultaa").val(),
      colorr: $("#colorr").val() 
    },
    $.ajax({
      type: "PUT",
      url: "/api/prof_agenda/" + agen.id,
      context: this,
      data: agen,
      success: function(data) {
        agen = JSON.parse(data);
        console.log(agen);
        $("#ModalAgendamento").modal('hide');
        console.log('OK - Consulta Finalizada');
         
         objCalendar.refetchEvents();        

      },
      error: function(error) {
        console.log(error);
      }
    });
  };



  function cancelaragen(id){
        var confirmado = confirm('Deseja realmente cancelar este agendamento? Esta operação não pode ser desfeita!');
        if(confirmado){
          console.log('vai dar certo');
          $('#descricao').val('');
          $('#id_historico>div').remove();
          return cancelaragen_s(id);          
        }else{
         //Apenas abortar o processo.
        } 
    }

  function cancelaragen_s(id){
    agen = {
      id: $("#idconsultaa").val(),
      color: $("#color").val(),
      descricao: $("#descricao").val()      
    },
    $.ajax({
      type: "PUT",
      url: "/api/prof_agenda/" + agen.id,
      context: this,
      data: agen,
      success: function(data) {
        agen = JSON.parse(data);
        console.log(agen);
        $("#ModalAgendamento").modal('hide');
        console.log('OK - Agendamento cancelado');
         
         objCalendar.refetchEvents();        

      },
      error: function(error) {
        console.log(error);
      }
    });
  };


  $("#ModalAgendamento").submit( function(event){
    event.preventDefault();
    salvarHistorico();
    //$("#ModalCadastro").modal('hide');
  });


   function salvarHistorico(){
        var confirmado = confirm('Deseja realmente incluir este histórico? Após a inclusão não é possivel excluir nem alterar o histórico!');
        if(confirmado){          
          return salvarHistorico_s();          
        }else{
         //Apenas abortar o processo.
        } 
   };

   function limparhistorico(){    
    $('.visagendamentos').slideToggle();
    $('.formedit').slideToggle();
    $('#id_historico>div').remove();
  };


  function salvarHistorico_s() {
    agen = {
      id: $("#id_consulta").val(),
      descricao: $("#descricao").val()    
    };
    $.ajax({
      type: "PUT",
      url: "api/prof_historico/"+ agen.id,
      context: this,
      data: agen,
      success: function(data) {
        agen = JSON.parse(data);        
        alert('Histórico Salvo com Sucesso!');

      linha = montarLinha(agen);
      $('#id_historico').append(linha);
      
        $('#descricao').val('');
        objCalendar.refetchEvents();  
      },
      error: function(error) {
        console.log(error);
      }
    });
  };

  function montarLinha(p){
  let datat = p.created_at;              
  let dataFormatada = $.datepicker.formatDate('dd/mm/yy', new Date(datat));
    
  var linha = '<div  style="margin-bottom: 15px; margin-right: 10px; position: relative"</div>'+
                    '<span class="bg-blue";   style="border-radius: 4px;'+
                                              'background-color: #fff;'+
                                              'display: inline-block;'+
                                              'font-weight: 600;'+
                                              'padding: 5px">'+ dataFormatada +'</span>'+
                    '</div><div style="margin-bottom: 15px;'+
                                      'margin-right: 10px;'+
                                      'position: relative">'+
                    '<i class="fas fa-comments bg-blue"; style="background: #adb5bd;'+
                                                        'border-radius: 50%;'+
                                                        'font-size: 15px;'+
                                                        'height: 30px;'+
                                                        'left: 18px;'+
                                                        'line-height: 30px;'+
                                                        'position: absolute;'+
                                                        'text-align: center;'+
                                                        'top: 0;'+
                                                        'width: 30px"></i>'+
                    '<div class="timeline-item"; style="margin-left: 60px;'+
                                                      'box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);'+
                                                      'border-radius: .25rem;'+
                                                      'background: #fff;'+
                                                      'color: #495057;'+
                                                      'margin-right: 15px;'+
                                                      'margin-top: 0;'+
                                                      'padding: 0;'+
                                                      'position: relative"> '+                                                             
                    '<input type="hidden" id="colorr" value="#00a65a" class="form-control">'+                                        
                    '<div class="timeline-body"; style="padding: 10px">' + p.descricao + '</div>'+
                    '</div></div>';     
    return linha;
};

  $('.btn-canc-vis').on("click", function(){
    $('.visagendamentos').slideToggle();
    $('.formedit').slideToggle();
    $('#id_historico>div').remove();
  });

  $('.btn-canc-edi').on("click", function(){
    $('.formedit').slideToggle();
    $('.visagendamentos').slideToggle();
    $('#id_historico>div').remove();
  });
  
   function SelecionarMedico($i) {
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
  };

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

  function carregarhistorico() { // carregar historico do paciente via ajax
    paci = {
    id: $('#id_consulta').val()  
  };
  $.getJSON('/prof_historico/historico/'+ paci.id, function(data){
        $('#id_historico>div').remove();    
        
         for(i=0;i<data.length; i++){
            s = montarLinha(data[i]);            
            $('#id_historico').append(s);      
          }
    });
};

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
         
    var url_med = '/agendamentos/box/'+ data.id_medico;   
    var event = objCalendar.addEventSource (url_med);
    });
};




/*  function carregarhistoricos(){
          $.getJSON('/prof_agenda/historicos', function(data){                        
          for(i=0;i<data.length;i++){
      
              let datat = data[i].created_at;
              
              let dataFormatada = $.datepicker.formatDate('dd/mm/yy', new Date(datat));
              console.log(dataFormatada);
              
              opcao = '<div  style="margin-bottom: 15px; margin-right: 10px; position: relative"</div>'+
                    '<span class="bg-blue";   style="border-radius: 4px;'+
                                              'background-color: #fff;'+
                                              'display: inline-block;'+
                                              'font-weight: 600;'+
                                              'padding: 5px">'+ dataFormatada +'</span>'+
                    '</div><div style="margin-bottom: 15px;'+
                                      'margin-right: 10px;'+
                                      'position: relative">'+
                    '<i class="fas fa-comments bg-blue"; style="background: #adb5bd;'+
                                                        'border-radius: 50%;'+
                                                        'font-size: 15px;'+
                                                        'height: 30px;'+
                                                        'left: 18px;'+
                                                        'line-height: 30px;'+
                                                        'position: absolute;'+
                                                        'text-align: center;'+
                                                        'top: 0;'+
                                                        'width: 30px"></i>'+
                    '<div class="timeline-item"; style="margin-left: 60px;'+
                                                      'box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);'+
                                                      'border-radius: .25rem;'+
                                                      'background: #fff;'+
                                                      'color: #495057;'+
                                                      'margin-right: 15px;'+
                                                      'margin-top: 0;'+
                                                      'padding: 0;'+
                                                      'position: relative"> '+                                                             
                    '<input type="hidden" id="colorr" value="#00a65a" class="form-control">'+                                        
                    '<div class="timeline-body"; style="padding: 10px">' + data[i].descricao + '</div>'+
                    '</div></div>';         
            $('#id_historico').append(opcao);
          }
      });
  };
  

 $(function(){
    carregarhistoricos();
  }); */


@endsection