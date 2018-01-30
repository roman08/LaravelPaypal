
{{ Form::open( ['route' => ['app.entidad'], 'method'=>'POST','files' => true, 'id' => 'frmIdentidad', 'name' => 'frmIdentidad' ,'enctype' => 'multipart/form-data']) }}
{{ csrf_field() }}
    {{ Form::hidden('idcliente',$idcliente) }}
    {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
    {{ Form::hidden('idplan',$idplan) }}
    {{ Form::hidden('idmun',$idmun) }}
    {{ Form::hidden('nombre',$nombre) }}
    {{ Form::hidden('idempresaApp', (isset($empresaApp)?$empresaApp->idempresa : 0) )}}
    {{ Form::hidden('identidad',(isset($entidad)?$entidad->idasoc_emp_imagen : 0),['id' => 'identidad'])}}
    {{ Form::hidden('identidad_ur_logo',(isset($entidad)?$entidad->url_logo : null))}}
    {{ Form::hidden('identidad_url_portada',(isset($entidad)?$entidad->url_portada : null))}}
    {{ Form::hidden('identidad_logo',(isset($entidad)?$entidad->imagen_logo : null))}}
    {{ Form::hidden('identidad_portada',(isset($entidad)?$entidad->imagen_portada : null))}}
    
 <div style="background: #005000;" class="text-center">
        <h3  class="center-block " style=" color: #ffffff;  position :relative !important; 
       ">TU IDENTIDAD</h3>
    </div>

    <div  class="text-center">
        <h4>Dinos como quieres que te conozcan</h4>
    </div>

        <div class="panel panel-success">
            
            <div class="panel-heading">Logotipo (160 x160)</div>
            <div class="panel-body">
                <div class="col-md-12" align="center">
                    <span id="alert_logo"></span>
                    {!!Form::hidden('imagen_logo', null ,['id'=>'img1'])!!}
                    <input name="logo" type="file" id="logo" style="display: none;" accept=".jpg">
                    <div class="info">
                        <div class="separator clear-left">
                            <p class="">Click en la imagen para agregar un logo</p>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    @if(!isset($entidad))
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-logo" id="btn-imagen-icono-logo" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                    @endif
                    <a href="javascript:void(0);" class="btn-imagen-logo" title="Click para asociar imagen">
                        <div id="imagen_logo">
                            @if(isset($entidad))
                                @if($entidad->url_logo)
                                    <img class="img-thumbnail"  id="Eimage" src='{{$entidad->url_logo}}' style="height: 160px; width: 160px;" > 
                                @endif
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">Portada (680 x 310)</div>
            <div class="panel-body">
                <div class="col-md-12" align="center">
                    <span id="alert_portada"></span>
                    {!!Form::hidden('imagen_portada', null ,['id'=>'img_portada'])!!}
                    <input name="portada" type="file" id="portada" style="display: none;" accept=".jpg">
                    <div class="info">
                        <div class="separator clear-left">
                            <p class="">Click en la imagen para agregar una portada</p>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    @if(!isset($entidad))
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-portada" id="btn-imagen-icono-portada" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                    @endif
                    
                    <a href="javascript:void(0);" class="btn-imagen-portada" title="Click para asociar imagen">
                        <div id="imagen_portada">
                            @if(isset($entidad))
                                @if($entidad->url_portada)
                                    <img class="img-thumbnail"  id="Eimage" src='{{$entidad->url_portada}}' style="height: 310px; width: 680px;" > 
                                @endif
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>

   
     <p class="pm-staff-profile-title"></p>

         <div class="row">
                        <!-- Plean Detail -->
                <div class="price-in mart-15">
                  <button class="btn btn-primary btn-success" id="btnEnvio" type="submit">Guardar Datos</button>
                </div>
    </div>
{{ Form::close() }}





<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

