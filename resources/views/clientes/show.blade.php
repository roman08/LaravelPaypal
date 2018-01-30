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
          <h5>MANTEN TUS DATOS DE CONTACTO ACTUALIZADOS</h5>
    {{ Form::open( ['route' => ['tarjeta.update'], 'method'=>'POST']) }}
    {{ csrf_field() }}
    {{ Form::hidden('id',$id)}}
        <div class="panel panel-default">
            <div class="panel-body">
                                    <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('numero_tarjeta') ? ' has-error' : '' }}">
                                                    {!!Form::label('numero_tarjeta','Número de tarjeta')!!}
                                                    {!!Form::text('numero_tarjeta',$tarjeta->num_tarjeta,[
                                                        'class'=>'form-control',
                                                        'id' => 'numero_tarjeta', 
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 'Número de tarjeta',
                                                        'maxlength' => 19,
                                                        'minlength' => 19])!!}
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('banco') ? ' has-error' : '' }}">
                                                    {!!Form::label('banco','Banco')!!}
                                                    {!!Form::text('banco',$tarjeta->banco,['class'=>'form-control', 'id' => 'banco', 'autocomplete'=>'off', 'placeholder' => 'Nombre banco'])!!}
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('titular') ? ' has-error' : '' }}">
                                                    {!!Form::label('titular','Titutlar de la tarjeta')!!}
                                                    {!!Form::text('titular',$tarjeta->titular,['class'=>'form-control', 'id' => 'titular', 'autocomplete'=>'off', 'placeholder' => 'Nombre del titular'])!!}
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('titular') }}</strong>
                                                        </span>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('tipo') ? ' has-error' : '' }}">
                                                    {!!Form::label('tipo','Tipo de tarjeta')!!}
                                                    <select name="tipo" id="tipo" class="form-control">
                                                        @foreach($tipos as $m => $key)
                                                            <option value="{{$m}}"
                                                                @if($m == $tarjeta->tipo)
                                                                    selected 
                                                                @endif
                                                            >{{$key}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('tipo'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('tipo') }}</strong>
                                                        </span>
                                                     @endif
                                                </div>     
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('mes') ? ' has-error' : '' }}" >
                                                    {!!Form::label('mes','Mes de vencimiento')!!}
                                                    <select name="mes" id="mes" class="form-control">
                                                        @foreach($meses as $m => $key)
                                                            <option value="{{$m}}"
                                                                @if($m == $tarjeta->mes)
                                                                    selected 
                                                                @endif
                                                            >{{$key}}</option>
                                                        @endforeach
                                                    </select>

                                                        @if ($errors->has('mes'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('mes') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('anio') ? ' has-error' : '' }}" >
                                                    {!!Form::label('anio','Año de vencimiento')!!}
                                                    {!!Form::text('anio', $tarjeta->anio,['class'=>'form-control numerico', 'id' => 'anio', 'autocomplete'=>'off', 'placeholder' => 'Año vencimiento ','minlength'=>'2','maxlength'=>'2', 'data-msg' => 'Ingrese 2 caracteres', 'autocomplete' => 'off' ])!!}
                                                        @if ($errors->has('anio'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('anio') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                <div class="form-group input full {{ $errors->has('cpp') ? ' has-error' : '' }}" >
                                                    {!!Form::label('cpp','Código postal')!!}
                                                    {!!Form::text('cpp', $tarjeta->cp,['class'=>'form-control', 'id' => 'cpp', 'autocomplete'=>'off', 'placeholder' => 'Código postal ','minlength'=>'6','maxlength'=>'6', 'data-msg' => 'Ingrese 6 caracteres', 'autocomplete' => 'off' ])!!}
                                                        @if ($errors->has('cpp'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('cpp') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center-block">
                                            <div class="col-md-6 col-sm-6 col-xs-12 btn-group">
                                                <button type="submit" class="btn btn-primary info" id="tdatos" style="background-color: #005000" >Guardar</button>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 btn-group">
                                                <a href="{{route('usuario.index')}}" class="btn btn-warning">Cancelar</a>
                                               
                                            </div>
                                        </div>
            </div>
        </div>
        {{Form::close()}}
        </div>
    </div>
</section>
@stop

@include('snippets.datatables-default')

@section('javascript')
     <script src="{{ asset('js/validacionNumero.js') }}"></script>
@stop