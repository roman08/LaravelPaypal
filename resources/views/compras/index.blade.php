@extends('layouts.public')

@section('style')
<style>
    
a {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

a:link {
  color: #265301;
}

a:visited {
  color: #437A16;
}

a:focus {
  border-bottom: 1px solid;
  background: #BAE498;
}

a:hover {
  border-bottom: 1px solid;     
  background: #CDFEAA;
}

a:active {
  background: #265301;
  color: #CDFEAA;
}
</style>
@stop
@section('menu')
  @include('menus.menuPrincipal')
@stop

@section('content')
{{ Form::open( ['route' => ['compra.store'], 'method'=>'POST', 'name' => 'frmTerminos', 'id' => 'frmTerminos']) }}
	{{ csrf_field() }}
	<div class="container" style="width: 90%;">
			@include('compras._form')
	</div>
	
{{ Form::close() }}
    
@stop

@include('compras.modalsTerminos._modalServicios')
@include('compras.modalsTerminos._modalTerminos')

@section('javascript')

  <script src="{{ asset('js/compras/script.js') }}"></script>
  

@stop
