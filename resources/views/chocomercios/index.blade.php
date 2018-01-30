@extends('layouts.public')

@section('menu')
  @include('menus.menuPrincipal')
@stop

@section('content')
	<div class="container" style="text-align: center; width: 85%;">
        <div class="row">
             @if(Session::has('status'))
                <div class="alert alert-info" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('status')}}
                </div>
            @endif
                @if(Session::has('error'))
                <div class="alert alert-info" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('error')}}
                </div>
            @endif
    		<div class="form-group" style="text-align: center;"><h1 >Bienvenido a CHOCOMERCIOS</h1></div>
    		<div class="form-group"><img src="/img/banner/Imagen03.png" alt="" class="img-responsive"></div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <div class="row">
                    <div class="form-group col-md-12"><img src="/img/home/RegistrarInformacion.png" alt="" class="img-responsive"></div>
                    <div class="form-group col-md-12"><img src="/img/home/Visualiza.png" alt="" class="img-responsive"></div>
                </div>
            </div>
            <div class="form-group col-md-4"><img src="/img/home/EnMedio.png" alt="" class="img-responsive"></div>
            <div class="form-group col-md-4">
                <div class="row">
                    <div class="form-group col-md-12"><img src="/img/home/publica.png" alt="" class="img-responsive"></div>
                    <div class="form-group col-md-12"><img src="/img/home/Comentarios.png" alt="" class="img-responsive"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <img src="/img/home/poratada.png" alt="" class="img-responsive">
            </div>
        </div>
	</div>
    
@stop

@section('javascript')
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/eliminaCookie.js') }}"></script>
@stop
     
