<!DOCTYPE html>
<html lang="pt-BR">

<title>@yield('titulo','Home')</title>

 @hasSection ('head')
                @yield('head')
            @else
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="csrf-token" content="m64OQPFRH6lZB4Ivt8Ca76O0EFG9aNxV3B5wfMr2">

                    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
                    <link rel="stylesheet" href="/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
                    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
                    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
                    <link href="{{ asset('select2') }}/css/select2.min.css" rel="stylesheet"/>
                </head>
            @endif


<body class="sidebar-mini sidebar-closed sidebar-collapse" >
  <div class="wrapper">

<nav class="main-header navbar navbar-expand border-bottom-0 navbar-dark navbar-cyan">
<div class="form-row">
    <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
        <span class="sr-only">Toggle navigation</span>
    </a>
</li>
        


<div class="col-10">
<a class="nav-link toastsDefaultWarning" data-toggle="dropdown" href="#" aria-expanded="false">
    <i class="fas fa-bullhorn"></i> Orientações
    <span class="badge badge-warning navbar">@yield('autofalante','0')</span>
</a>
</div>

<div class="col-9">
</div>
<div class="col-3">
</div>

<div class="col-7">
<li class="nav-item dropdown">
              
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <div class="media align-items-center" id="usuario">

                </div>
              </a>           
              <div class="dropdown-menu dropdown-menu-right">                            
                
                <a href="/sair" class="dropdown-item">
                  <i class="fas fa-power-off"></i>
                  <span> Logout</span>
                </a>
              </div>
</li>
</div>



     </ul>
    <ul class="navbar-nav ml-auto">
     </ul>


</div>
</nav>
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="home" class="brand-link">   
            <img src="/vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE"
            class="brand-image img-circle elevation-3" style="opacity:.8">
            <span class="brand-text font-weight-light ">
                <b>Web Clinic</b> System
            </span>
        </a>
        <div class="sidebar">
        <nav class="mt-0">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" >          

    <li>
      <li  class="nav-header">FUNÇÕES</li>      
    <li  class="nav-item">
  
    <a class="nav-link" href="/agenda">
       <i class="nav-icon far fa-calendar-alt"></i>
       <p>Agenda Médica
       <span class="badge badge-success right"></span>
       </p>
   </a>

   <li  class="nav-item">
   <a class="nav-link"
   href="/relatorios">
    <i class="nav-icon fas fa-copy"></i>
    <p>Relatórios
    <span class="badge badge-success right"></span>
    </p>
   </a> 


    <li>
        <li  class="nav-header">CADASTROS</li>    
    
    <li  class="nav-item">
    <a class="nav-link"
       href="/convenios">
        <i class="nav-icon fas fa-book"></i>
        <p>Convênios
        <span class="badge badge-success right"></span>
        </p>
    </a>

    <li  class="nav-item">
        <a class="nav-link"
           href="/especialidades">
            <i class="nav-icon fas fa-book"></i>
            <p>Especialidades
            <span class="badge badge-success right"></span>
            </p>
        </a>
    
    <li  class="nav-item">
        <a class="nav-link"
           href="/conselhos">
            <i class="nav-icon fas fa-book"></i>
            <p>Conselhos
            <span class="badge badge-success right"></span>
            </p>
        </a>        

    <li  class="nav-item">
    <a class="nav-link"
       href="/pacientes">
        <i class="nav-icon far fa-fw fa-user"></i>
        <p>Pacientes
        <span class="badge badge-success right"></span>
        </p>
    </a>

    <li  class="nav-item">
      <a class="nav-link"
         href="/medicos">
          <i class="nav-icon far fa-fw fa-user"></i>
          <p>Profissional de Saúde
          <span class="badge badge-success right"></span>
          </p>
      </a>

      <li  class="nav-item">
        <a class="nav-link"
           href="/atendentes">
            <i class="nav-icon far fa-fw fa-user "></i>
            <p>Atendentes
            <span class="badge badge-success right"></span>
            </p>
        </a>

</li>
    <li  class="nav-header">CONFIGURAÇÕES DE CONTAS
</li>

<li  class="nav-item">
    <a class="nav-link"
       href="/usuarios">
        <i class="nav-icon fas fa-fw fa-user "></i>
        <p>Usuários</p>
    </a>

</li>
<li  class="nav-item">
    <a class="nav-link"
       href="/perfis">
        <i class="nav-icon fas fa-fw fa-lock "></i>
        <p>Perfis</p>
    </a>

</li>
        </nav>
    </div>

</aside>
        
<div class="content-wrapper ">
    
   
        <div class="content">
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb">
                    <div class="col-sm-6">
                      <h4>@yield('container-fluid','')</h4>
                    </div>
                    
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="\home">Home</a></li>
                        <li class="breadcrumb-item active">@yield('diretory','')</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>

            <main role="main">
            @hasSection ('body')
                @yield('body')
            @else
        
        <div class="row">
         <section class="col-lg-7 connectedSortable">
          <section class="content">                                 
          </section>
        </div>   
            @endif
            </main>
        </div>
    </div>
       
        <footer class="main-footer" style="width:30%;"> 
        <h9></h9>
        </footer>        
        
        
    </div>
      
        <script>
            @yield('script')
        </script>

</body>

</html>
