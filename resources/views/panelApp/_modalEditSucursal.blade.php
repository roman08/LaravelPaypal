<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar  Sucursal</h4>
      </div>
      <div class="modal-body" id="modal-body" style="display: none;">
        {{ Form::open( ['route' => ['sucursales.update', 0], 'method'=>'PUT' , 'id' => 'frmEditSucursal']) }}

                    {{ Form::hidden('idsucursal',null,['id' => 'idsucursal']) }}

            <div class="row">
                <div class="form-group col-md-12">
                    {!!Form::label('nombreS','Nombre de la Sucursal')!!}
                    {!!Form::text('nombre', null,['id' => 'idnombre','class'=>'form-control','placeholder'=>'Nombre sucursal', 'autocomplete'=>'off','maxlength' => 100])!!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!!Form::label('telefono','Teléfono')!!}
                    {!!Form::text('telefono', null,['id' => 'idtelefono','class'=>'form-control numerico','placeholder'=>'Teléfono', 'autocomplete'=>'off','maxlength' => 12])!!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 radio-buttons">
                    {{ Form::checkbox('entrega', null,  0,['id' => 'identrega']) }}
                    {!!Form::label('entrega','Sí cuento con servicio a domicilio',array('class' => 'radio-custom'))!!}
                </div>
            </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Ubicación de tu Negocio</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <div class="col-md-6">
                                            {!!Form::label('calle','Calle')!!}
                                                {!!Form::text('calle',null,
                                                    [
                                                        'class'=>'form-control',
                                                        'id' => 'idcalle', 
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 
                                                        'Calle', 
                                                        'required' => 'required',
                                                        'maxlength' => 200
                                                        ])!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!!Form::label('numero','Número')!!}
                                                {!!Form::text('numero',null,
                                                    [
                                                        'class'=>'form-control',
                                                        'id' => 'idnumero', 
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 
                                                        'Número', 
                                                        'maxlength' => 6])!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!!Form::label('interior',' Interior')!!}
                                                {!!Form::text('interior',null,
                                                    [
                                                        'class'=>'form-control',
                                                        'id' => 'idinterior',  
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 
                                                        'Número Interior', 
                                                        
                                                        'maxlength' => 6])!!}
                                        </div>
                                        <div class="col-md-6">
                                            {!!Form::label('colonia','Colonia')!!}
                                                {!!Form::text('colonia',null,
                                                    [
                                                        'class'=>'form-control',
                                                        'id' => 'idcolonia',  
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 
                                                        'Colonia', 
                                                        'required' => 'required',
                                                        'maxlength' => 200])!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!!Form::label('cp','Código Postal')!!}
                                                {!!Form::text('cp',null,
                                                    [
                                                        'class'=>'form-control',
                                                        'id' => 'idcp',
                                                        'autocomplete'=>'off', 
                                                        'placeholder' => 
                                                        'xxxxx', 
                                                        'required' => 'required',
                                                        'maxlength' => 6])!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!!Form::label('idmunicipio','Municipio',['class' => 'control-label'])!!}
                                            
                                            <select name="idmunicipio" id="idmunicipio" class="form-control" required>
                                                <option value="">Seleccione un municipio</option>
                                                @foreach($municipios as $key => $p)
                                                    <option value="{{$key}}" @if(isset($empresaApp) && $empresaApp->idmunicipio ==$key )  selected @endif >{{$p}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{ Form::hidden('lat',null,['id' =>'idlat']) }}
                                        {{ Form::hidden('lng',null,['id' =>'idlng']) }}
                                        {{ Form::hidden('municipio',null,['id' =>'idmunicipiotexto']) }}
                                        
                                    </div>
                                    <div class="form-group col-md-2">
                                            <div class="center-text">
                                                <a  href="#collapseExample"  id="buscars"><img src="/img/maps.png" alt="Mostar mapa" style="width: 50%;  margin-left: auto; margin-right: auto;" class="img-responsive"></a>
                                            </div>
                                            <span>Ubicate en el mapa, para poder finalizar el registro.</span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12 form-group">
                                        <span id="idlatm"></span>
                                        <span id="idlonm"></span>
                                        <div id="map_canvas2" style="background-color: #e6dfde "></div>
                                    </div>
                            </div>
                        </div>

                         <div class="row">
                    <div class="price-in mart-15">
                        
                    </div>
                </div>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-success green " id="btnEditSucursal" type="submit">Actualizar datos</button>
      </div>
            {{Form::close()}}
  
    </div>
  </div>
</div>


