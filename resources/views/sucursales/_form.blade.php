{{ Form::open( ['route' => ['sucursales.store'], 'method'=>'POST']) }}
    {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}

<div class="row">
    <div class="form-group col-md-12">
        {!!Form::label('nombre','Nombre de la sucursal')!!}
        {!!Form::text('nombre', null,['class'=>'form-control','placeholder'=>'Nombre sucursal', 'autocomplete'=>'off'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {!!Form::label('telefono','Teléfono')!!}
        {!!Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Teléfono', 'autocomplete'=>'off'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12 radio-buttons">
        {{ Form::checkbox('entrega', null,  0) }}
        {!!Form::label('entrega','Sí cuento con servicio a domicilio',array('class' => 'radio-custom'))!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <div class=" input full {{ $errors->has('idmunicipio') ? ' has-error' : '' }}">
            {!!Form::label('idmunicipio','Municipio',['class' => 'control-label'])!!}
            <select name="idmunicipio" id="idmunicipio" class="form-control">
                @foreach($municipios as $key => $p)
                    <option value="{{$key}}">{{$p}}</option>
                @endforeach
            </select>
            <div class="validation"></div>
        </div>
    </div>
</div>

            <div class="panel panel-default">
                <div class="panel-heading">Ubicación de tu Negocio</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <div class="col-md-6">
                                {!!Form::label('calle','Calle')!!}
                                    {!!Form::text('calle',isset($secciones)?$secciones[0]:null,
                                        [
                                            'class'=>'form-control',
                                            'id' => 'calle', 
                                            'autocomplete'=>'off', 
                                            'placeholder' => 
                                            'Calle', 
                                            'required' => 'required'])!!}
                            </div>
                            <div class="col-md-3">
                                {!!Form::label('numero','Número')!!}
                                    {!!Form::text('numero',isset($secciones)?$secciones[2]:null,
                                        [
                                            'class'=>'form-control',
                                            'id' => 'numero', 
                                            'autocomplete'=>'off', 
                                            'placeholder' => 
                                            'Número', 
                                            'required' => 'required'])!!}
                            </div>
                            <div class="col-md-3">
                                {!!Form::label('interior',' Interior')!!}
                                    {!!Form::text('interior',isset($secciones)?$secciones[3]:null,
                                        [
                                            'class'=>'form-control',
                                            'id' => 'interior',  
                                            'autocomplete'=>'off', 
                                            'placeholder' => 
                                            'Número Interior', 
                                            'required' => 'required'])!!}
                            </div>
                            <div class="col-md-6">
                                {!!Form::label('colonia','Colonia')!!}
                                    {!!Form::text('colonia',isset($secciones)?$secciones[1]:null,
                                        [
                                            'class'=>'form-control',
                                            'id' => 'colonia',  
                                            'autocomplete'=>'off', 
                                            'placeholder' => 
                                            'Colonia', 
                                            'required' => 'required'])!!}
                            </div>
                            <div class="col-md-3">
                                {!!Form::label('cp','Código Postal')!!}
                                    {!!Form::text('cp',isset($secciones)?$secciones[4]:null,
                                        [
                                            'class'=>'form-control',
                                            'id' => 'cp',
                                            'autocomplete'=>'off', 
                                            'placeholder' => 
                                            'xxxxx', 
                                            'required' => 'required'])!!}
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
                            {{ Form::hidden('lat',(isset($empresaApp))?$empresaApp->latitud:null,['id' =>'lat']) }}
                            {{ Form::hidden('lng',(isset($empresaApp))?$empresaApp->longitud:null,['id' =>'lng']) }}
                            {{ Form::hidden('municipio',isset($secciones)?$secciones[5]:null,['id' =>'municipio']) }}
                            
                        </div>
                        <div class="form-group col-md-2">
                                <div class="center-text">
                                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="buscar"><img src="/img/maps.png" alt="Mostar mapa" style=" height: 50%; width: 50%;  margin-left: auto; margin-right: auto;" class="img-responsive"></a>
                                </div>
                                <span>Ubicate en el mapa, para poder finalizar el registro.</span>
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
            <button class="btn btn-success green " type="submit">Guardar datos</button>
        </div>
    </div>
{{Form::close()}}