<div class="modal fade" id="myModalPromoion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Promoción</h4>
            </div>
            <div class="modal-body" id="modal-body-promociones" style="display: none;">
                {{ Form::open( ['route' => ['promocion.create'], 'method'=>'POST','files' => true, 'name' => 'frmPromo', 'id' =>'frmPromo', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('noPromocion',old('noPromocion'),['id' => 'noPromocion']) }}
                {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
                {{ Form::hidden('idempresaApp', (isset($entidad)?$empresaApp->idempresa : 0) )}}

                <div class="row">
                    <div class="form-group col-md-6">
                        {!!Form::label('fecha_inicio','Fecha de Inicio')!!}
                        {!!Form::text('fecha_inicio', old('fecha_inicio'),['id'=>'fecha_inicio', 'class'=>'form-control','placeholder'=>'DD/MM/AAAA', 'autocomplete'=>'off','required' =>'required'])!!}
                    </div>

                    <div class="form-group col-md-6">
                        {!!Form::label('fecha_fin','Fecha de Expiración')!!}
                        {!!Form::text('fecha_fin', old('fecha_fin'),['id'=>'fecha_fin','class'=>'form-control','placeholder'=>'DD/MM/AAAA', 'autocomplete'=>'off','required' =>'required', 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        {!!Form::label('subcategoria','Subcategoría')!!}
                        <select name="subcategoriaPromociones" id="subcategoriaPromociones" class="form-control">
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
                        {!!Form::textArea('descripcion', old('descripcion'),['id' => 'descripcion', 'class'=>'form-control','placeholder'=>'Describa brevemente su promoción', 'autocomplete'=>'off','rows' => 2,'required' =>'required', "maxlength" => "30"])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12" align="center">
                        <div>
                            {!!Form::label('nota','Seleccione una imagen en formato .JPG y un peso menor a 512k')!!}
                             {!!Form::hidden('imagen_promocion', old('imagen_promocion') ,['id'=>'img_promicion'])!!}
                             <p></p>
                             <input name="promocion" type="file" id="promocion" style="display: none;" accept=".jpg">
                        </div>
                        <span id="alert_logo"></span>
                       
                        
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-promocion" id="btn-imagen-icono" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                        <a href="javascript:void(0);" class="btn-imagen-promocion" title="Click para asociar imagen">
                            <div id="imagen_promocion">
                               
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success green " id="btnPromo" type="submit">Guardar datos</button>
            </div>
                {{Form::close()}}
        </div>
    </div>
</div>


