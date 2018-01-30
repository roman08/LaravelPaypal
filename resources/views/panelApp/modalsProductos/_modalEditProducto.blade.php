<div class="modal fade" id="myModalEditProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
            </div>
            <div class="modal-body" id="modal-body-editProducto" style="display: none;">
                {{ Form::open( ['route' => ['producto.update'], 'method'=>'POST','files' => true, 'name' => 'frmProductoEdit', 'id' => 'frmProductoEdit', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('noProductoedit',old('noProductoedit'),['id' => 'noProducto']) }}
                {{ Form::hidden('idempresaedit',$idempresa,['id' => 'idempresa']) }}
                {{ Form::hidden('idempresaAppedit', (isset($entidad)?$empresaApp->idempresa : 0) )}}
                {{ Form::hidden('idprodcutoedit',old('idprodcutoedit'),['id' => 'idprodcutoedit']) }}
                {{ Form::hidden('urlImagen',old('urlImagen'),['id' => 'urlImagen']) }}
                {{ Form::hidden('ImageneditP',old('ImageneditP'),['id' => 'ImageneditP']) }}
                <div class="row">
                    <div class="form-group col-md-12">
                        {!!Form::label('nombre_producto_edit','Nombre del Producto')!!}
                        {!!Form::text('nombre_producto_edit', old('nombre_producto_edit'),['id' => 'nombre_producto_edit','class'=>'form-control','placeholder'=>'Nombre del producto o servicio', 'autocomplete'=>'off','required' =>'required', 'maxlength' => 40])!!}
                    </div>
                </div>
                <div class="row">
                     <div class="form-group col-md-12">
                        {!!Form::label('descripcion_producto_edit','Descripción')!!}
                        {!!Form::textArea('descripcion_producto_edit', old('descripcion_producto_edit'),['id' => 'descripcion_producto_edit', 'class'=>'form-control','placeholder'=>'Descripción detallada de su porducto o servicio', 'autocomplete'=>'off','required' =>'required', 'rows' => '1', 'maxlength' => 300])!!}
                    </div>
                </div>

       

               <div class="row">
                    <div class="form-group col-md-12" align="center">
                        <div>
                            {!!Form::label('nota','Seleccione una imagen en formato .JPG y un peso menor a 512k')!!}
                        </div>
                        {!!Form::hidden('imagen_producto', old('imagen_producto') ,['id'=>'img_promicion'])!!}
                        <input name="productoEdit" type="file" id="productoEdit" style="display: none;" accept=".jpg">
                            <a href="javascript:void(0);" class="btn btn-success btn-imagen-producto-edit" id="btn-imagen-icono-producto-tdit" title="Click para asociar imagen">
                                <i class="fa fa-image fa-5x"></i>
                            </a>
                        <a href="javascript:void(0);" class="btn-imagen-producto-edit" title="Click para asociar imagen">
                            <div id="imagen_producto_edit">
                               
                            </div>
                        </a>
                        
                    </div>
                </div>

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success green " id="btnProductoEdit" type="submit">Guardar datos</button>
            </div>
                {{ Form::close()}}
        </div>
    </div>
</div>


