<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Sucursal</h4>
      </div>
      <div class="modal-body" id="modal-body1" style="display: none;">
        {{ Form::open( ['route' => ['sucursales.store'], 'method'=>'POST', 'name' => 'frmNuevaSucursal' , 'id' => 'frmNuevaSucursal']) }}
        {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}

            <div class="row">
                <div class="form-group col-md-12">
                    {!!Form::label('nombreS','Nombre de la Sucursal')!!}
                    {!!Form::text('nombreS', old('nombreS'),['class'=>'form-control','placeholder'=>'Nombre sucursal', 'autocomplete'=>'off', 'maxlength' => 100])!!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!!Form::label('telefono','Teléfono')!!}
                    {!!Form::text('telefono', old('telefono'),['class'=>'form-control numerico','placeholder'=>'Teléfono', 'autocomplete'=>'off', 'maxlength' => 12])!!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 radio-buttons">
                    {{ Form::checkbox('entrega', old('entrega'),  0) }}
                    {!!Form::label('entrega','Sí cuento con servicio a domicilio',array('class' => 'radio-custom'))!!}
                </div>
            </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">Ubicación de tu Negocio</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!!Form::label('calle','Calle')!!}
                                                    {!!Form::text('calle',old('calle'),
                                                        [
                                                            'class'=>'form-control',
                                                            'id' => 'calle', 
                                                            'autocomplete'=>'off', 
                                                            'placeholder' => 
                                                            'Calle', 
                                                            'required' => 'required',
                                                            'maxlength' => 200])!!}
                                            </div>
                                            <div class="col-md-3">
                                                {!!Form::label('numero','Número')!!}
                                                    {!!Form::text('numero',old('numero'),
                                                        [
                                                            'class'=>'form-control numerico',
                                                            'id' => 'numero', 
                                                            'autocomplete'=>'off', 
                                                            'placeholder' => 
                                                            'Número', 
                                                            
                                                            'maxlength' => 5])!!}
                                            </div>
                                            <div class="col-md-3">
                                                {!!Form::label('interior',' Interior')!!}
                                                    {!!Form::text('interior',old('interior'),
                                                        [
                                                            'class'=>'form-control numerico',
                                                            'id' => 'interior',  
                                                            'autocomplete'=>'off', 
                                                            'placeholder' => 
                                                            'Número Interior',
                                                            'maxlength' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!!Form::label('colonia','Colonia')!!}
                                                    {!!Form::text('colonia',old('colonia'),
                                                        [
                                                            'class'=>'form-control',
                                                            'id' => 'colonia',  
                                                            'autocomplete'=>'off', 
                                                            'placeholder' => 
                                                            'Colonia', 
                                                            'required' => 'required',
                                                            'maxlength' => 200])!!}
                                            </div>
                                            <div class="col-md-3">
                                                {!!Form::label('cp','Código Postal')!!}
                                                    {!!Form::text('cp',old('cp'),
                                                        [
                                                            'class'=>'form-control numerico',
                                                            'id' => 'cp',
                                                            'autocomplete'=>'off', 
                                                            'placeholder' => 
                                                            'xxxxx', 
                                                            'required' => 'required',
                                                            'maxlength' => 5])!!}
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
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                            <div class="center-text">
                                                <a  href="#collapseExample"  id="buscar"><img src="/img/maps.png" alt="Mostar mapa" style="width: 50%;  margin-left: auto; margin-right: auto;" class="img-responsive"></a>
                                            </div>
                                            <span>Da clic en el icono para ubicarte en el mapa.</span>
                                            {{ Form::hidden('lat',old('lat'),['id' =>'lat']) }}
                                            {{ Form::hidden('lng',old('lng'),['id' =>'lng']) }}
                                            {{ Form::hidden('municipio',old(''),['id' =>'municipio']) }}
                                    </div>
                                    
                                </div>
                                <div class="col-md-12 form-group">
                                        <span id="latm"></span>
                                        <span id="lonm"></span>
                                        <div id="map_canvas" style="background-color: #e6dfde "></div>
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
        <button class="btn btn-success green " id="btnSucursal" type="submit">Guardar datos</button>
      </div>
            {{Form::close()}}
  
    </div>
  </div>
</div>


