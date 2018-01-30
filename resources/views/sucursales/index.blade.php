@extends('layouts.public')


@section('menu')
    @include('menus.menuPrincipal')
@stop
@section('content')
<section>

  <div class="container" style="width: 90%;"> 
          <div class="panel panel-default">
            <div class="panel-heading text-center"><h4>Nueva sucursal</div>
              <div class="panel-body">

                  @include('sucursales._form')
              </div>
           </div>
         </div>

</section>
@stop

@section('javascript')
   <script src="{{ asset('js/empresa/mapa.js') }}"></script>

   <script>
$(document).ready(function() {
  $(window).on("load resize", function() {
    var alturaBuscador = $(".buscador").outerHeight(true),
      alturaVentana = $(window).height(),
      alturaMapa = alturaVentana - alturaBuscador;
    
    $("#mapa-geocoder").css("height", alturaMapa+"px");
  });
});
</script>
@stop
