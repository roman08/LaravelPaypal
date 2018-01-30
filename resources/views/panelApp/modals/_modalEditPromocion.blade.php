<div class="modal fade" id="myModalEditPromocion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Promoción</h4>
            </div>
            <div class="modal-body" id="modal-body-editPromocion" style="display: none;">
                {{ Form::open( ['route' => ['promocion.update'], 'method'=>'POST','files' => true, 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('noPromocionEdit',null,['id' => 'noPromocionEdit']) }}
                {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
                {{ Form::hidden('idempresaApp', (isset($entidad)?$empresaApp->idempresa : 0) )}}
                {{ Form::hidden('imagen', null,['id' => 'imagenRespaldo'] )}}
                {{ Form::hidden('url', null, ['id' => 'urlRespaldo'] )}}


                <div class="row">
                    <div class="form-group col-md-6">
                        {!!Form::label('fecha_inicio','Fecha de Inicio')!!}
                        {!!Form::text('fecha_inicio', null,['id' => 'fechaInicio','class'=>'form-control','placeholder'=>'DD/MM/AAAA', 'autocomplete'=>'off','required' =>'required'])!!}
                    </div>

                    <div class="form-group col-md-6">
                        {!!Form::label('fecha_fin','Fecha de Expiración')!!}
                        {!!Form::text('fecha_fin', null,['id' => 'fechaFin','class'=>'form-control','placeholder'=>'DD/MM/AAAA', 'autocomplete'=>'off','required' =>'required'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {!!Form::label('subcategoria','Subcategoría')!!}
                        <select name="subcategoriaPromociones" id="subcategoriaPromocionesEdit" class="form-control">
                           @if(isset($subcategorias))
                            @foreach($subcategorias as $s)
                                <option value="{{$s->idsubclasificacion}}">{{$s->subcategoria}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        {!!Form::label('descripcion','Nombre de la Promoción')!!}
                        {!!Form::textArea('descripcion', null,['id' => 'descripcionEdit', 'class'=>'form-control','placeholder'=>'Describa brevemente su promoción', 'autocomplete'=>'off','rows' => 2,'required' =>'required', "maxlength" => "30"])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12" align="center">
                        <div>
                            {!!Form::label('nota','Seleccione una imagen en formato .JPG y un peso menor a 512k')!!}
                        </div>
                        <span id="alert_logo"></span>
                        {!!Form::hidden('imagen_promocion', null ,['id'=>'img_promicion'])!!}
                        <input name="promocionEdit" type="file" id="promocionEdit" style="display: none;" accept=".jpg">
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-promocion-edit" id="btn-imagen-icono-edit" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                        <a href="javascript:void(0);" class="btn-imagen-promocion-edit" title="Click para asociar imagen">
                            <div id="imagen_promocion_edit">
                               
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success green " id="btnPromoEdit" type="submit">Guardar datos</button>
            </div>
                {{Form::close()}}
        </div>
    </div>
</div>


