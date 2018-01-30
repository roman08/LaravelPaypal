@extends('layouts.public')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">

	<style>
body,
body * {
	margin:0;
	font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
}

.buscador {
	text-align:center;
	padding:30px 0px;
}

.buscador #direccion {
	margin:10px auto;
	width:100%;
	padding:7px;
	max-width:250px;
}

.buscador #buscar {
	margin:0 auto;
	max-width:250px;
	padding:7px;
	color:#FFFFFF;
	background:#f2777a;
	border:2px solid #f2777a;
	cursor:pointer;
}
</style>
@stop
@section('menu')
  @include('menus.menuPrincipal')
@stop

@section('content')
{{ Form::open( ['route' => ['empresa.store'], 'method'=>'POST', 'name' => 'rfmEmpresa']) }}
	{{ csrf_field() }}
	<div class="container">
		<div class="panel panel-success">
			<div class="panel-heading">Nueva Empresa</div>
			<div class="panel-body">
				<div class="col-md-8">@include('empresas._form')</div>
				<div class="col-md-4">@include('empresas._compras')</div>
			</div>
		</div>
	</div>
	
{{ Form::close() }}
    
@stop

