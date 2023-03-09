<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Viagens Online')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <!-- Theme style -->
          
  <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/AdminLte/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/AdminLte/plugins/fontawesome-free/css/all.min.css') }}">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/AdminLte/dist/img/AdminLTELogo.png') }}"  alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('signout') }}" class="nav-link">Sair</a>
      </li>

     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src=" {{ asset('/AdminLte/dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrador</span>
    </a>
 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/AdminLte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#" class="d-block">user</a>
        </div>
      </div>
   
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
               @if(Route::is('dashboard') )
               <a href="{{ route('dashboard') }}" class="nav-link active" >
               @else
               <a href="{{ route('dashboard') }}" class="nav-link" >
 
               @endif
                
             
              <i class="fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item {{ (Route::is('bilhete.index')|| Route::is('tarifa.index')) ? 'menu-is-opening menu-open' : '' }}  ">
         
               <a href="#" class="nav-link {{ (Route::is('bilhete.index')|| Route::is('tarifa.index')) ? 'active' : '' }}" >
             
        
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Finanças
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
          @if($autorizacao->compra!= 'bloqueado')
            <li class="nav-item">
              @if(Route::is('bilhete.index') )
               <a href="{{ route('bilhete.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('bilhete.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-shopping-cart"></i>
              <p>
                Compras
              </p>
            </a>
          </li>
          @endif

          @if($autorizacao->tarifa!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('tarifa.index') )
               <a href="{{ route('tarifa.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('tarifa.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-tree"></i>
              <p>
                Tarifas
              </p>
            </a>
          </li>
          @endif
              
            </ul>
          </li>
          



      <li class="nav-item {{ (Route::is('regalia.index')|| Route::is('membro.index')) ? 'menu-is-opening menu-open' : '' }}  ">
         
         <a href="#" class="nav-link {{ (Route::is('regalia.index')|| Route::is('membro.index')) ? 'active' : '' }}" >
       
  
        <i class="nav-icon fas fa-copy"></i>
        <p>
         Membro e Regalias
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
      @if($autorizacao->regalia!= 'bloqueado')
      <li class="nav-item">
              @if(Route::is('regalia.index') )
               <a href="{{ route('regalia.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('regalia.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-gift"></i>
              <p>
                Regalias
              </p>
            </a>
        </li> 
      @endif
      
      @if($autorizacao->membro!= 'bloqueado')
        <li class="nav-item">
              @if(Route::is('membro.index') )
               <a href="{{ route('membro.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('membro.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-user"></i>
              <p>
                membros
              </p>
            </a>
        </li>    
   
      @endif
   
        
      </ul>
    </li>
    
    
          
               
    @if($autorizacao->voo!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('voo.index') )
               <a href="{{ route('voo.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('voo.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                voos
              </p>
            </a>
          </li>
    @endif

    @if($autorizacao->frota!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('frota.index') )
               <a href="{{ route('frota.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('frota.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane"></i>
              <p>
                Frotas
              </p>
            </a>
          </li>
    @endif


    @if($autorizacao->aeroporto!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('aeroporto.index') )
               <a href="{{ route('aeroporto.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('aeroporto.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-stop"></i>
              <p>
                aeroportos
              </p>
            </a>
          </li>
    @endif



          <li class="nav-item {{ (Route::is('reclamacao.index')|| Route::is('reembolso.index')) ? 'menu-is-opening menu-open' : '' }} ">

          <a href="#" class="nav-link {{ (Route::is('reclamacao.index')|| Route::is('reembolso.index')) ? 'active' : '' }} ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pedidos
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
            @if($autorizacao->reclamacao!= 'bloqueado')
            <li class="nav-item">
              @if(Route::is('reclamacao.index') )
               <a href="{{ route('reclamacao.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('reclamacao.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-exclamation-triangle"></i>
              <p>
              Reclamacao
                <span class="badge badge-danger right">{{App\Models\Reclamacao::All()->count()}}</span>
              </p>
            </a>
          </li>
          @endif

          @if($autorizacao->reembolso!= 'bloqueado')
          <li class="nav-item">

              @if(Route::is('reembolso.index') )
               <a href="{{ route('reembolso.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('reembolso.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-retweet"></i>
              <p>
                reembolso

                <span class="badge badge-info right">{{App\Models\Reembolso::All()->count()}}</span>
              </p>
            </a>
          </li>
          @endif
        </ul>

        </li>

        @if($autorizacao->utilizador!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('utilizador.index') )
               <a href="{{ route('utilizador.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('utilizador.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-user"></i>
              <p>
                utilizadores
              </p>
            </a>
          </li>
        @endif

        @if($autorizacao->permissao!= 'bloqueado')
          <li class="nav-item">
              @if(Route::is('permissao.index') )
               <a href="{{ route('permissao.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('permissao.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-user"></i>
              <p>
                Permissoes
              </p>
            </a>
          </li>

        @endif


 
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @yield('content')
  
   <!-- /.content-wrapper -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<!-- Bootstrap 4 -->

<script src="{{ asset('/bootstrap/js/jquery.min.js') }}"></script>
<script src=" {{ asset('/AdminLte/plugins/jquery-ui/jquery-ui.min.js') }} "></script>
<script src=" {{ asset('/AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
@yield('javascript')

<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<!-- ChartJS -->


<script src=" {{ asset('/AdminLte/dist/js/adminlte.js') }} "></script>
<!-- AdminLTE for demo purposes -->  

</body>
</html>
