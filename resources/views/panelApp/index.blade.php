@extends('layouts.public')



@section('menu')
  @include('menus.menuPrincipal')
@stop


@section('content')
<section>

  @if($empresafiscal->tipoplan == 'Plan Básico')
    @php($logoplan = 'basico')
  @endif
  @if($empresafiscal->tipoplan == 'Plan Plus')
    @php($logoplan = 'plus')
  @endif
   @if($empresafiscal->tipoplan == 'Plan Premium')
    @php($logoplan = 'premium')
  @endif
  <div class="container" style="width: 90%;" > 
          <div class="form-group row" > 
              <div class="col-md-8  text-center divFondo borderCabecera">
                <div class="row">
                      <div class="col-md-4 "  >
                          <span > <strong class="tituloCabecera">  <p >{{$empresafiscal->tipoplan}}</p></strong></span>
                          <p><img src="/img/Emcabezado/{{$logoplan}}.png" alt="Logo del Plan" class="LogoPlan"></p>
                      </div>
                      <div class="col-md-4">
                       <strong class="tituloCabecera">  <p >{{$empresafiscal->empresa}}</p></strong></span>
                       <span >   <p  class="tituloSecundario" > <strong>Vigencia:</strong>  {{$fechaTermino}}</p></span>
                      </div>
                      <div class="col-md-4 " >
                          <span > <strong class="tituloCabecera">  <p >Estado</p></strong></span>
                          <span id="estadoEmp" >   <p  class="tituloSecundario" >{{$empresafiscal->estado}} en CHOCOMERCIOS</p></span>
                          {{Form::hidden('estadoEmpre',$empresafiscal->estado,['id' => 'estadoEmpre'])}}
                      </div>
                  </div>
                  <div class="row">
                    <p ><span class="text-center" id="msgModificar">Si desea modificar la información de su empresa, debe cambiar la publicación a Diseño.</span></p>
                  </div>
              </div>
              <!-- iconp diseño -->
              <div class="col-md-2  text-center borderCabecera borderIcono">
                  <a href="#"
                      @if(isset($empresaApp)) 
                          id="{{$empresaApp->idempresa}}" 
                      @endif 
                      @if($empresafiscal->estado == 'En Diseño') 
                          style="pointer-events: none;" 
                          @php($logoD = '/img/Emcabezado/DisenoDesactivado.png')
                      @else  
                          @php($logoD = '/img/Emcabezado/Diseno.png') 
                          @endif class="img-responsive disenarEmpresa">
                          <img src="{{$logoD}}" class="img-responsive logosEmcabezado" alt="" id="logoDiseno" title="Diseño" >
                          <span>En Diseño</span>
                  </a>
              </div>
              <!-- icono publicado -->
              <div class="col-md-2  text-center borderCabecera borderIcono" >
                  <a href="#" 
                      @if(isset($empresaApp)) 
                          id="{{$empresaApp->idempresa}}" 
                      @endif 
                      @if($empresafiscal->estado == 'Publicado') 
                          @php($logoP = '/img/Emcabezado/publicadodesactivado.png')
                          style="pointer-events: none;" 
                      @else
                          @php($logoP = '/img/Emcabezado/publicado.png')
                      @endif  class="img-responsive logosEmcabezado publicarEmpresa">
                      <img src="{{$logoP}}"  alt="" title="Publicar" id="logoPublicado" >
                      <span>Publicar</span>
                  </a>
          </div>
          </div>
          <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                          <div class="board">
                              <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                              <div class="board-inner">
                                  <ul class="nav nav-tabs" id="myTab">
                                      
                                      <li class="li">
                                          <a href="#profile" data-toggle="tab" title="Capturar Información Basica" id="pprofile" >
                                              <span class="round-tabs two">
                                                  <i class=" glyphicon glyphicon-info-sign">Información Básica</i>
                                              </span>
                                          </a>
                                      </li>
                                      
                                      <li class="">
                                          <a class="toglePanel" href="#categorias" @if(isset($empresaApp)) data-toggle="tab" title="Agrega categorias" @else  title="Para capturar categorias debe dar de alta Información basica." style="color: red;" @endif  id="pcategorias" >
                                              <span class="round-tabs two">
                                                  <i class="glyphicon glyphicon-tags">  Clasificación </i>
                                              </span>
                                          </a>
                                      </li>

                                      <li class="">
                                          <a class="toglePanel" href="#picture"  @if(isset($empresaApp)) data-toggle="tab" title="Agregar Identidad" @else  title="Para capturar la identidad debe dar de alta Información basica." style="color: red;" @endif  id="ppicture">
                                              <span class="round-tabs two">
                                                  <i class="glyphicon glyphicon-user">  Identidad</i>
                                              </span>
                                          </a>
                                      </li>
                                      
                                      <li class="" >
                                          <a class="toglePanel" href="#video" 

                                            @if(isset($empresaApp))
                                              title="Agregar Horario"
                                              data-toggle="tab"
                                            @else
                                              title="Para capturar los horario debe dar de alta Información basica."
                                              style="color: red;"
                                            @endif
                                            id="pvideo">
                                              <span class="round-tabs two" >
                                                  <i class="glyphicon glyphicon-time">  Horario</i>
                                              </span>
                                          </a>
                                      </li>
                                     
                                      <li class="">
                                          <a class="toglePanel" href="#sucursales" 
                                            
                                            @if(isset($empresaApp)) 
                                                
                                                title="Agregar sucursales" 

                                                @if($plan->tipoplan == 'Plan Básico')
                                                  style="color: gray;"
                                                  data-toggle="plus"
                                                @else 
                                                  data-toggle="tab"
                                                @endif
                                            @else  
                                              title="Para capturar las sucursales debe dar de alta Información basica."  
                                              style="color: red;" 
                                            @endif   
                                            id="psucursales">
                                              <span class="round-tabs two" >
                                                  <i class="glyphicon glyphicon-home">  Sucursales</i>
                                              </span>
                                          </a>
                                      </li>
                                     
                                      <li class="">
                                          <a class="toglePanel" href="#promociones" 
                                            
                                          @if(isset($empresaApp))
                                            title="Agregar promociones" 
                                                  @if($plan->tipoplan == 'Plan Básico')
                                                    style="color: gray;"
                                                    data-toggle="plus"
                                                  @elseif ($plan->tipoplan == 'Plan Plus')
                                                    style="color: gray;"
                                                    data-toggle="premiun"
                                                  @else 
                                                    data-toggle="tab"
                                                  @endif
                                          @else  
                                              title="Para capturar las promociones debe dar de alta Información basica."  
                                              style="color: red;" 
                                          @endif   
                                              id="ppromociones">
                                              <span class="round-tabs two" >
                                                  <i class="glyphicon glyphicon-tag">  Promociones</i>
                                              </span>
                                          </a>
                                      </li>
                                     
                                      
                                      <li class="">
                                          <a class="toglePanel" href="#productos" 
                                            
                                           @if(isset($empresaApp)) 
                                              title="Agregar productos" 

                                              @if($plan->tipoplan == 'Plan Básico')
                                                style="color: gray;"
                                                data-toggle="plus"
                                              @else
                                                data-toggle="tab"
                                              @endif
                                            @else  
                                              title="Para capturar los productos debe dar de alta Información basica." 
                                              style="color: red;" 
                                            @endif   
                                            id="pproductos">
                                              <span class="round-tabs two" >
                                                  <i class="glyphicon glyphicon-shopping-cart">  Productos</i>
                                              </span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                      
                                  <div class="tab-content">
                                    <!-- div datos personales -->
                                      <div class="tab-pane fade " id="profile">
                                        @include('panelApp._form')
                                      </div>

                                      <div class="tab-pane fade " id="categorias">
                                        @include('panelApp._categorias')
                                      </div>

                                      <div class="tab-pane fade" id="picture">
                                         @include('panelApp._entidad')
                                      </div>

                                      <div class="tab-pane fade " id="video">
                                          @include('panelApp._horarios')
                                      </div>

                                      <div class="tab-pane fade " id="sucursales">
                                          @include('panelApp._sucursales')
                                      </div>

                                      <div class="tab-pane fade " id="promociones">
                                          @include('panelApp._promociones')
                                      </div>

                                      <div class="tab-pane fade " id="productos">
                                          @include('panelApp._productos')
                                      </div>
                                  </div>
                          </div>
                </div>
             </div>
          </div>
         </div>
</section>
@stop

@include('panelApp._modal1')
@include('panelApp._modalEditSucursal')
@include('panelApp._modalHorario')
@include('panelApp.modals._modalPromociones')
@include('panelApp.modals._modalEditPromocion')

@include('panelApp.modalsProductos._modalProducto')
@include('panelApp.modalsProductos._modalEditProducto')

@section('javascript')

  <script src="{{ asset('js/imagenes/imagenLogo.js') }}"></script>
  <script src="{{ asset('js/imagenes/asignarImagenLogo.js') }}"></script>
  <script src="{{ asset('js/imagenes/imagenPortada.js') }}"></script>
  <script src="{{ asset('js/imagenes/asignarImagenPortada.js') }}"></script>
  <script src="{{ asset('js/empresa/empresaApp.js') }}"></script>

  <script src="{{ asset('js/app/horarios.js') }}"></script>
  <script src="{{ asset('js/app/horarioSucursal.js') }}"></script>
  <script src="{{ asset('js/empresa/mapa.js') }}"></script>
  <script src="{{ asset('js/app/promociones.js') }}"></script>
  <script src="{{ asset('js/app/productos.js') }}"></script>

  <script src="{{ asset('js/tarjetas/responsiveCarousel.min.js') }}"></script>
<script>
    jQuery(document).ready(function() {
 
        $('#myCarousel').carousel();
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>

@stop

@include('snippets.datatables-default')