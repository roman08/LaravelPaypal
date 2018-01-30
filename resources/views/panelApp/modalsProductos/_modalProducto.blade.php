<div class="modal fade" id="myModalProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
            </div>
            <div class="modal-body" id="modal-body-producto" style="display: none;">
                {{ Form::open( ['route' => ['producto.create'], 'method'=>'POST','files' => true, 'name' => 'frmProduct', 'id' =>'frmProduct', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('noProducto',old('noProducto'),['id' => 'noProducto']) }}
                {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
                {{ Form::hidden('idempresaApp', (isset($entidad)?$empresaApp->idempresa : 0) )}}

                <div class="row">
                    <div class="form-group col-md-12">
                        {!!Form::label('nombre_producto','Nombre del Producto')!!}
                        {!!Form::text('nombre_producto', old('nombre_producto'),['class'=>'form-control','placeholder'=>'Nombre del producto o servicio', 'autocomplete'=>'off','required' =>'required', 'maxlength' => 40])!!}
                    </div>
                </div>
                <div class="row">
                     <div class="form-group col-md-12">
                        {!!Form::label('descripcion_producto','Descripción')!!}
                        {!!Form::textArea('descripcion_producto', old('descripcion_producto'),['class'=>'form-control','placeholder'=>'Descripción detallada de su porducto o servicio', 'autocomplete'=>'off','required' =>'required', 'rows' => '1', 'maxlength' => 300])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12" align="center">
                        <div>
                            {!!Form::label('nota','Seleccione una imagen en formato .JPG y un peso menor a 512k')!!} 
                            {!!Form::hidden('imagen_producto', old('imagen_producto') ,['id'=>'img_promicion'])!!}
                             <p></p>
                            <input name="producto" type="file" id="producto" style="display: none;" accept=".jpg">

                        </div>
                       
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-producto" id="btn-imagen-icono-producto" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                        <a href="javascript:void(0);" class="btn-imagen-producto" title="Click para asociar imagen">
                            <div id="imagen_producto">
                               
                            </div>
                        </a>
                        
                    </div>
                </div>

               
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success green " id="btnProducto" type="submit">Guardar datos</button>
            </div>
                {{Form::close()}}
        </div>
    </div>
</div>


