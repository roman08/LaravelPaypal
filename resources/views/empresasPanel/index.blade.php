@extends('layouts.public')

@section('menu')
  @include('menus.menuPrincipal')
@stop

@section('content')
	<div class="container" style="float: center; width: 95%;"> 
		@include('alerts._alerts')
	 	<div class="row">
	        <div class="panel panel-default">
	            <div class="panel-body">
	                <div class="col-md-12">
	                    {{ Form::open( ['route' => ['empresa.store'], 'method'=>'POST']) }}
						{{ csrf_field() }}
							@include('empresasPanel._form')
						{{ Form::close() }}

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
    
@stop

@include('snippets.datatables-default')