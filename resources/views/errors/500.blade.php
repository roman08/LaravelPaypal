@extends('layouts.public')



@section('content')

<div class="container text-center">
               
    <div class="row">
        <div class="">
            <div class="panel">
                <div class="panel-heading">
                    <img src="/img/Encabezado.png">
                </div>
                <div class="panel-body">
                    <a href="javascript:window.history.back();" class="btn btn-primary pull-right" role="button"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
                    <br>
                    <div align="center" style="border:dashed thin silver;">
                        <h1>Error 500</h1>
                        <h2>ERROR INTERNO DEL SISTEMA.</h2>
                        <h4>{{date("Y-m-d H:i:s")}}</h4>
                        <!-- <h4>{{Request::getClientIp()}}</h4> -->
                        <h3 style="color: red;">    {{$exception->getMessage()}} </h3>
                    </div>
                    <div align="center">
                        <h4>Favor de reportar esta pantalla de error. Si no le es posible realizar una captura de pantalla copie el texto que aparecen en el recuadro anterior</h4>                        
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
@stop