@extends('layouts.public')

@section('menu')
  @include('menus.menuPrincipal')
@stop


@section('content')
	 <!--Feature-->
    <section id ="feature" >
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
              <h2>Detalles del Plan</h2>
              <hr class="bottom-line center-block">
            </div>
          <div class="panel panel-success">
            <div class="panel-heading">{{$plan->tipoplan}}</div>
            <div class="panel-body">
                  <div class="col-md-4">
                    <div class="panel panel-success">
                      <div class="panel-body ">
   					            @yield('descripcion')
                      </div>
                    </div>

                  </div>
                  <div class="col-md-4">
                      <div class="panel panel-success">
                        <div class="panel-body">
                          @yield('logo')
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-success">
                      <div class="panel-heading">Adquiere este plan</div>
                      <div class="panel-body">
                        <div class="heading pull-right">
                            <h4>${{ number_format( $plan->precio, 2, '.', ',')  }} M.N. mensuales!!</h4>
                            <h5>En tu primer compra recibe un mes <strong style="color: #C00">gratis!!</strong> del plan contratado.</h5>
                            <a href="{{route('empresa.index',['id' => Crypt::encrypt($id)  ])}} " class="btn btn-primary btn-success" > Comprar</a>
                            <br>
                        </div>
                      </div>
                    </div> 
                  </div>
            </div>
          </div>
        </div>
        <p class="pm-staff-profile-title"></p>
      </div>
    </section>
    
     <!--Feature-->
    <section >
      <div class="container">
        @yield('contenido')
      </div>
    </section>
       <!--Feature-->
      <section id ="feature" >
        <div class="container">
          <div class="row">
            <div class="header-section text-center">
              <h2>Otros planes</h2>
              <hr class="bottom-line center-block">
            </div>
              @yield('planes')
          </div>
        </div>
      </section>

    
@stop