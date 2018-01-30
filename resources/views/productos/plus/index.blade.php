@extends('layouts.productos')

@section('descripcion')
	<img src="/img/planes/plus/plusdetalle.png" class="img-responsive" alt="" style="height: 100%; width: 100%;">
@stop

@section('logo')
	<img src="/img/planes/plus/plus.png" class="img-responsive" alt="Logo principal." style="height: 100%;
      width: 100%;">
@stop

@section('titulo')
	Plan plus -  $500.00
@stop

@section('contenido')
	 <div class="row">
    <div class="header-section text-center">
      <h2>Servicios del plan</h2>
      <hr class="bottom-line center-block">
    </div>
    <div class="feature-info">
      <div class="fea">
        <div class="col-md-3">
          <div class="heading pull-right">
            <h4>Localización</h4>
            <p>Ubicación del comercio con GPS desde CHOCOMERCIOS.</p>
            <p>Llamadas directas al comercio desde el móvil.</p>
          </div>
          <div class="fea-img pull-left">
            <img src="/img/planes/iconosDetalle/geolocalization.png" class="img-responsive" alt="" style="height: 60%;
      width: 60%;">
          </div>
        </div>
      </div>
      <div class="fea">
        <div class="col-md-3">
          <div class="heading pull-right">
            <h4>Identidad</h4>
            <p>Portada y logotipo del comercio.</p>
            <p>Detalle general del comercio.</p>
            <p>Horarios de atención.</p>
            <p>Página Web.</p>
            <p>Múltiple clasificación de categorías.</p>
          </div>
          <div class="fea-img pull-left">
            <img src="/img/planes/iconosDetalle/online-shop.png" class="img-responsive" alt="" style="height: 60%;
      width: 60%;">
          </div>
        </div>
      </div>    
    <div class="fea">
        <div class="col-md-3">
          <div class="heading pull-right">
            <h4>Productos</h4>
            <p>Publicidad de 10 productos o servicios estrellas.</p>
          </div>
          <div class="fea-img pull-left">
            <img src="/img/planes/iconosDetalle/productos.png" class="img-responsive" alt="" style="height: 60%;
      width: 60%;">
          </div>
        </div>
    </div>    

      <div class="fea">
        <div class="col-md-3">
          <div class="heading pull-right">
            <h4>Sucursales</h4>
            <p>Publicidad  de información básica de  3 sucursales.</p>
            <p>Se incluyen en las búsquedas por municipios</p>
          </div>
          <div class="fea-img pull-left">
            <img src="/img/planes/iconosDetalle/Sucursales.png" class="img-responsive" alt="" style="height: 60%;
      width: 60%;">
          </div>
        </div>
      </div>      
    </div>
  </div>
@stop


@section('planes')

   @foreach($planes as $p)
              @if($p->idplan != $id)
                <div class="feature-info">
                    <div class="fea">
                      <div class="col-md-6">
                        <div class="heading pull-right">
                            <div class="pm-staff-profile-container">
                                <div class="pm-staff-profile-image-wrapper text-center">
                                    <img src="/img/planes/@if($p->tipoplan == 'Plan Básico'){{'basico/basico'}}@elseif ($p->tipoplan == 'Plan Plus'){{'plus/plus'}}@else($p->tipoplan == 'Plan Premium'){{'premium/premium'}}@endif.png" class="img-responsive" alt="Logo principal.">
                                </div>                                
                                <div class="pm-staff-profile-details text-center pagination-centered">  
                                    @if($p->tipoplan == 'Plan Básico')
                                      @php($rotue = 'basico')@endif
                                    @if($p->tipoplan == 'Plan Plus')
                                      @php($rotue = 'plus')@endif
                                    @if($p->tipoplan == 'Plan Premium')
                                      @php($rotue = 'premium')@endif
                                    <p class="pm-staff-profile-name"><a href="{{route($rotue.'.index',['id' => $p->idplan])}}">{{$p->tipoplan}} <br>${{$p->precio}}.00</a></p>
                                </div>     
                            </div>
                        </div>
                      </div>
                    </div> 
                </div>
              @endif
            @endforeach

@stop