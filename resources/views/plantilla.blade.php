@extends('layouts.public')

@section('banner')
      <!-- Indicators -->
      <div id="myCarousel" class="carousel slide container" data-ride="carousel" style="float: center; width: 95%;">
          <!-- Wrapper for slides -->
          <div class="carousel-inner " role="listbox" >
              <div class="item active">
                  <img src="/img/banner/Imagen05.png" alt="Chania">
                  
              </div>
              <div class="item ">
                  <img src="/img/banner/Imagen00.png" alt="Chania">
                  
              </div>
              <div class="item">
                  <img src="/img/banner/Imagen01.png" alt="Chania">
                  
              </div>
              <div class="item">
                  <img src="/img/banner/Imagen02.png" alt="Flower">
                  
              </div>
              <div class="item">
                  <img src="/img/banner/Imagen03.png" alt="Flower">
            <!--  <div class="carousel-caption">
                      <h3>Header of Slide3</h3>
                      <p>Details of Slide 3. Lorem Ipsum Blah Blah Blah....</p>
                  </div>  -->
              </div>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="fa fa-angle-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="fa fa-angle-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
          </ol>
      </div>
  
    <!--/ Banner-->
@stop

@section('menu')
  @include('menus.menuPrincipal')
@stop

@section('content')
	

    <!--Feature-->
    <section id ="feature" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Publicidad Móvil Acelerada</h2>
            <p>Facilitamos a los comercios tripularse en el concepto de las aplicaciones móviles.</p>
            <hr class="bottom-line center-block">
          </div>
          <div class="feature-info">
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Costos Accesibles</h4>
                  <p>Pensada en todos los bolsillos.</p>
                  <p>Pagos mensuales y controlados a tu presupuesto.</p>
                  <p>Sin plazos forzosos.</p>
                  <p>Con soporte incluido en el costo de tu plan.</p>
                </div>
                <div class="fea-img pull-left">
                  <img src="/img/caracteristicas/Costos.png" class="img-responsive" alt="">
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Modernización Garantizada</h4>
                  <p>Agiliza los tiempos de implementación.</p>
                  <p>Administra que información quieres publicar.</p>
                  <p>Sin costos adicionales por actualizaciones.</p>
                </div>
                <div class="fea-img pull-left">
                  <img src="/img/caracteristicas/Modernizacion.png" class="img-responsive" alt="">
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Crecimiento en Ventas </h4>
                  <p>Aperturas un nuevo canal de ventas y comunicación con tus clientes.</p>
                  <p>Publicidad más efectiva y directa</p>
                  <p>Aseguras que la publicidad llegue directo a tus clientes prospectos.</p>
                  <p>Motivas la fidelización de tus clientes.</p>
                </div>
                <div class="fea-img pull-left">
                  <img src="/img/caracteristicas/Ventas.png" class="img-responsive" alt="">
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
    </section>
    

    
    <!--Courses-->
    <section id ="courses" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Beneficios</h2>
            <p>¿Cómo te ayudará Chocomercios?</p>
            <hr class="bottom-line center-block">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course01.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 1</h3>
                  <p>Podrás dar a conocer tu dirección, teléfono y página web así como la información de tus sucursales.</p>
              </figcaption>
              
            </figure>
          </div>
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course02.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 2</h3>
                  <p>Podrá darles a conocer a tus clientes el detalle de tus productos o servicios estrellas.</p>
              </figcaption>
              
            </figure>
          </div>
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course03.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 3</h3>
                  <p>Recibirás en tu cuenta las calificaciones y comentarios que los clientes emitan desde Chocomercios de los productos o servicios que ofertes.</p>
              </figcaption>
              
            </figure>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course04.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 4</h3>
                  <p>¡Tienes que ser destacado! así cuando los clientes busquen productos o servicios relacionados con tu comercio seas de las primeras opciones.</p>
              </figcaption>
              
            </figure>
          </div>
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course05.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 5</h3>
                  <p>Tu identidad comercial estará presente en las búsquedas de los clientes y prospectos que visiten Chocomercios.</p>
              </figcaption>
              
            </figure>
          </div>
          <div class="col-md-4 col-sm-4 ">
            <figure class="imghvr-fold-up">
              <img src="img/course/course06.png" class="img-responsive">
              <figcaption>
                  <h3>Beneficio # 6</h3>
                  <p>Podrá dar a conocer tus promociones y controlar sus vigencias.<br> Te notificaremos cuando tus clientes quieren recibir tus promociones.</p>
              </figcaption>
              
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!--/ Courses-->
    <!--Pricing-->
    <section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
                <h2>Productos</h2>
                <hr class="bottom-line center-block">
          </div>
          @foreach($planes as $p)
            <div class="col-md-4 col-sm-4">
              <div class="price-table">
                <!-- Plan  -->
                <div class="pricing-head">
                  <h4>{{$p->tipoplan}} Mensual</h4>
                    @if($p->tipoplan == 'Plan Básico')
                      @php($img = 'basico/basico')@endif
                    @if ($p->tipoplan == 'Plan Plus')
                       @php($img = 'plus/plus')@endif
                    @if($p->tipoplan == 'Plan Premium')
                      @php($img = 'premium/premium')@endif
                   
                  <img src="img/planes/{{$img}}.png" class="img-responsive center-block">
                 <h3>${{ number_format( $p->precio, 2, '.', ',')  }} M.N.<br> Mensuales</h3>
                 <h5>Su empresa podrá publicar</h5>
                @if($p->tipoplan == 'Plan Básico')
                    <ul class="list-group">
                      <li class="list-group-item">
                        Identidad Básica
                        <span class="badge badge-pill badge-success"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Localización en GPS
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        10 Productos o Servicios
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                      <li class="list-group-item">
                        Sucursales
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                      <li class="list-group-item">
                        Lista de destacados
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                      <li class="list-group-item">
                        Promociones
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                    </ul>
                @endif
                @if($p->tipoplan == 'Plan Plus')
                    <ul class="list-group">
                      <li class="list-group-item">
                        Identidad Básica
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Localización en GPS
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        10 Productos o Servicios
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        3 Sucursales
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Lista de destacados
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                      <li class="list-group-item">
                        Promociones
                        <span class="badge badge-error badge-pill"><i class="glyphicon glyphicon-remove"></i></span>
                      </li>
                    </ul>
                @endif
                @if($p->tipoplan == 'Plan Premium')
                    <ul class="list-group">
                      <li class="list-group-item ">
                        Identidad Básica
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Localización en GPS
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        10 Productos o Servicios
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Sucursales Ilimitadas
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        Lista de destacados
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                      <li class="list-group-item">
                        5 Promociones
                        <span class="badge badge-success badge-pill"><i class="glyphicon glyphicon-ok"></i></span>
                      </li>
                    </ul>
                @endif
                </div>
            
                <!-- Plean Detail -->
                <div class="price-in mart-15">

                  @if($p->tipoplan == 'Plan Básico')
                      @php($rotue = 'basico')@endif
                    @if ($p->tipoplan == 'Plan Plus')
                       @php($rotue = 'plus')@endif
                    @if($p->tipoplan == 'Plan Premium')
                      @php($rotue = 'premium')@endif
                  <a href="{{route($rotue.'.index', ['id' => $p->idplan])}}" class="btn btn-bg green btn-block">COMPRAR...</a> 
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
@stop
