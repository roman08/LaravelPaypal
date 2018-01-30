@extends('layouts.public')
@section('style')
	<style>
		#accordion .panel-heading { padding: 0;}
    #accordion .panel-title > a {
    	display: block;
    	padding: 0.4em 0.6em;
        outline: none;
        font-weight:bold;
        text-decoration: none;
    }

    #accordion .panel-title > a.accordion-toggle::before, #accordion a[data-toggle="collapse"]::before  {
        content:"\e113";
        float: left;
        font-family: 'Glyphicons Halflings';
    	margin-right :1em;
    }
    #accordion .panel-title > a.accordion-toggle.collapsed::before, #accordion a.collapsed[data-toggle="collapse"]::before  {
        content:"\e114";
    }
	</style>
@stop

@section('menu')
    @include('menus.menuPrincipal')
@stop
@section('content')
<section>
    <div class="container" style="width: 90%;"> 
        <div class="row">
        <h3>CLIENTE - {{$user->name}} </h3>
          <h5>MANTEN TUS DATOS DE CONTACTO ACTUALIZADOS</h5>
  
        <div class="panel panel-default" id="accordion">
            <div class="panel-body">
                        <div class="board">
                            <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                            <div class="board-inner">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="li">
                                        <a href="#profile" data-toggle="tab" class="panel" title="profile"  id="pdatos" >
                                            <span class="round-tabs two">
                                                <i class="glyphicon glyphicon-user"> Datos Personales y Fiscales</i>
                                            </span>
                                        </a>
                                    </li>
                                    <!-- <li class="">
                                        <a href="#video" data-toggle="tab" class="panel" title="video"   id="ptarjetas">
                                            <span class="round-tabs two" >
                                                <i class="glyphicon glyphicon-credit-card"> Formas de Pago</i>
                                            </span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                    
                            <div class="tab-content">
                                  <!-- div datos personales -->
                                <div class="tab-pane fade " id="profile">
                                    @include('clientes._form')
                                </div>
                                <!--<div class="tab-pane fade " id="video">
                                    @include('clientes._tarjetas')
                                </div>-->
                            </div>
                        </div>
            </div>
        </div>
        </div>
    </div>
</section>
@stop
@section('javascript')
  <script src="{{ asset('js/jquery.cookie.js') }}"></script>

    <script src="{{ asset('js/jquery.mask.js') }}"></script>
        <script src="{{ asset('js/validacionNumero.js') }}"></script>

@stop


