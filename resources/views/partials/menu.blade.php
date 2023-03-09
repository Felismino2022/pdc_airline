<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href=""><img src="foto" width="38" height="38" class="rounded-circle" alt="photo"></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user font-size-sm"></i> &nbsp;{{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
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


          <li class="nav-item">
              @if(Route::is('reserva.index') )
               <a href="{{ route('bilhete.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('bilhete.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                reservas
              </p>
            </a>
          </li>

          <li class="nav-item">
              @if(Route::is('tarifa.index') )
               <a href="{{ route('tarifa.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('tarifa.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                Tarifas
              </p>
            </a>
          </li>
          <li class="nav-item">
              @if(Route::is('regalia.index') )
               <a href="{{ route('regalia.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('regalia.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                Regalias
              </p>
            </a>
          </li>          

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


          <li class="nav-item">
              @if(Route::is('frota.index') )
               <a href="{{ route('frota.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('frota.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                Frotas
              </p>
            </a>
          </li>

          <li class="nav-item">
              @if(Route::is('aeroporto.index') )
               <a href="{{ route('aeroporto.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('aeroporto.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                aeroportos
              </p>
            </a>
          </li>

          <li class="nav-item">
              @if(Route::is('membro.index') )
               <a href="{{ route('membro.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('membro.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                reclamações
              </p>
            </a>
          </li>


          <li class="nav-item">
              @if(Route::is('utilizador.index') )
               <a href="{{ route('utilizador.index') }}" class="nav-link active" >
               @else
               <a href="{{ route('utilizador.index') }}" class="nav-link" >
 
               @endif
             
              <i class="fa fa-plane-departure"></i>
              <p>
                utilizadores
              </p>
            </a>
          </li>

                </ul>
            </div>
        </div>
</div>
