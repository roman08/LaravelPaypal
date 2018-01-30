@if (Auth::guest())
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href='/'><span class="glyphicon glyphicon-home"></span>   Chocomercios</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='#feature'>Características</a></li>
            <li><a href='#courses'>Beneficios</a></li>
            <li><a href='#pricing'>Productos</a></li>
            <li><a href="#modalLogin" id="modalLogin">Área de clientes</a>



            </li>
           
          </ul>
          </div>
        @elseif(Auth::user()->idcliente)
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/web/home/chocomercios"><span class="glyphicon glyphicon-home"></span>   Inicio</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <li><a href="/web/usuario">MIS DATOS</a></li>
            <li><a href="/web/panel/empresas">MIS EMPRESAS</a></li>
            <!-- <li><a href='#'>MIS PAGOS</a></li> -->
            <li><a href='{{ route('inicio.soporte') }}'>SOPORTE</a></li>
            <li class="dropdown">
              <a href='#' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} / SALIR<span class="caret"></span>
              </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                  </li>
                </ul>
              </li>            
          </ul>
          </div>
        @else
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/web/home/chocomercios"><span class="glyphicon glyphicon-home"></span>      Inicio</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href='#' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} / SALIR<span class="caret"></span>
              </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                  </li>
                </ul>
              </li>            
          </ul>
          </div>


        @endif




  