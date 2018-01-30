
{{ Form::open( ['route' => ['app.store'], 'method'=>'POST','name' =>'frmInfoBasica', 'id' => 'frmInfoBasica']) }}

    {{ Form::hidden('idcliente',$idcliente) }}
    {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
    {{ Form::hidden('idplan',$idplan) }}
    {{ Form::hidden('idmun',$idmun) }}
    {{ Form::hidden('nombre',$nombre) }}
    {{ Form::hidden('idempreApp', ($empresaApp)? $empresaApp->idempresa : null)}}
    
    <div style="background: #005000;" class="text-center">
        <h3  class="center-block" style=" color: #ffffff;  position :relative !important; 
       ">TU INFORMACIÓN BÁSICA</h3>
    </div>

    <div  class="text-center">
        <h4>Describe como quieres que te encuentren!!!</h4>
    </div>
        
    <div class="row">

         <div class="col-md-6  form-group">
            {!!Form::label('correo','Correo para la APP ')!!}<span>(Ejemplo: usuario@dominio.com)</span>
            {!!Form::text('correo',($empresaApp)?$empresaApp->mail_app : old('correo'),['id' => 'mailApp', 'class'=>'form-control','placeholder'=>'Ejempol@ejemplo.com', 'autocomplete'=>'off','maxlength' => 100])!!}
            <div id="spMailApp" style="display: none;">
                <strong><h5 style="color: red">Formato incorrecto.</h5></strong>
            </div>  
        </div>

        <div class="col-md-6  form-group">
            {!!Form::label('telefono','Teléfono para la APP ')!!}<span>(Ejemplo: 5550055555)</span>
            {!!Form::text('telefono',($empresaApp)?$empresaApp->telefono_app :  old('telefono'),['class'=>'form-control numerico','placeholder'=>'Número de Teléfono', 'autocomplete'=>'off','maxlength' => 12,'minlength' => 10 ])!!}
            <!-- <div class="help-block">Es el nombre legal de la empresa.</div>  -->
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4 radio-buttons">
            {{ Form::checkbox('entrega',  old('entrega'), ($empresaApp )?$empresaApp->entrega : 0) }}
            {!!Form::label('entrega','Sí cuento con servicio a domicilio',array('class' => 'radio-custom'))!!}
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-12">
            {!!Form::label('pagina','Página web',['class' => 'requerido'])!!}
            {!!Form::text('pagina',($empresaApp)?$empresaApp->sitio_web : 'http://',[
                'class'=> $errors->has('pagina') ? 'form-control error' : 'form-control',
                'placeholder'=>'http://www.ejemplo.com.mx', 
                'autocomplete'=>'off',
                'maxlength' => 200])!!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            {!!Form::label('desc_corta','Descripción Corta ',['class' => 'requerido'])!!}
            {!!Form::text('desc_corta',($empresaApp)?$empresaApp->descripcion_corta :  old('desc_corta'),[
                'class'=> $errors->has('desc_corta') ? 'form-control error' : 'form-control',
                'placeholder'=>'Descripción corta', 
                'autocomplete'=>'off',
                'maxlength' => 50])!!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('descripcion','Descripción ',['class' => 'requerido'])!!}
            {!!Form::textarea('descripcion',($empresaApp)?$empresaApp->descripcion : old('descripcion'),[
                'class'=> $errors->has('descripcion') ? 'form-control error' : 'form-control',
                'placeholder'=>'Descripción completa', 
                'autocomplete'=>'off',
                'rows' => 2,
                'maxlength' => 500])!!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            {!!Form::label('palabras','Palabras de Búsqueda ',['class' => 'requerido', 'id' => 'palabras'])!!}
            {!!Form::text('palabras',($empresaApp)?$empresaApp->palabras_claves: old('palabras'),[
                'class'=> $errors->has('palabras') ? 'form-control error' : 'form-control',
                'placeholder'=>'Palabras1, Palabras2, Palabra3', 
                'autocomplete'=>'off'])!!}
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
                                        {!!Form::text('calle',isset($empresaApp->calle)?$empresaApp->calle : old('calle'),
                                            [
                                                'class'=>'form-control',
                                                'id' => 'pcalle', 
                                                'autocomplete'=>'off', 
                                                'placeholder' => 
                                                'Calle', 
                                                'required' => 'required',
                                                'maxlength' => 200])!!}
                                </div>
                                <div class="col-md-3">
                                    {!!Form::label('numero','Número')!!}
                                        {!!Form::text('numero',isset($empresaApp->numero)?$empresaApp->numero:old('numero'),
                                            [
                                                'class'=>'form-control numerico',
                                                'id' => 'pnumero', 
                                                'autocomplete'=>'off', 
                                                'placeholder' => 
                                                'Número', 
                                                'maxlength' => 5])!!}
                                </div>
                                <div class="col-md-3">
                                    {!!Form::label('interior',' Interior')!!}
                                        {!!Form::text('interior',isset($empresaApp->interior)?$empresaApp->interior:null,
                                            [
                                                'class'=>'form-control',
                                                'id' => 'pinterior numerico',  
                                                'autocomplete'=>'off', 
                                                'placeholder' => 
                                                'Número Interior', 
                                                'maxlength' => 5])!!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!!Form::label('colonia','Colonia')!!}
                                        {!!Form::text('colonia',isset($empresaApp->colonia)?$empresaApp->colonia:old('colonia'),
                                            [
                                                'class'=>'form-control',
                                                'id' => 'pcolonia',  
                                                'autocomplete'=>'off', 
                                                'placeholder' => 
                                                'Colonia', 
                                                'required' => 'required',
                                                'maxlength' => 200])!!}
                                </div>
                                <div class="col-md-3">
                                    {!!Form::label('cp','Código Postal')!!}
                                        {!!Form::text('cp',isset($empresaApp->codigo_postal)?$empresaApp->codigo_postal:old('cp'),
                                            [
                                                'class'=>'form-control numerico',
                                                'id' => 'pcp',
                                                'autocomplete'=>'off', 
                                                'placeholder' => 
                                                'xxxxx', 
                                                'required' => 'required',
                                                'maxlength' => 5])!!}
                                </div>
                                <div class="col-md-3">
                                    {!!Form::label('idmunicipio','Municipio',['class' => 'control-label'])!!}
                                    
                                    <select name="idmunicipio" id="idmunicipiop" class="form-control" required>
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
                                       <a  href="#collapseExample"  id="buscarPrincipal"><img src="/img/maps.png" alt="Mostar mapa" style="width: 50%;  margin-left: auto; margin-right: auto;" class="img-responsive"></a>
                                    </div>
                                    <span>Da clic en el icono para ubicarte en el mapa.</span>
                                                                {{ Form::hidden('municipiop',null,['id' =>'municipiop']) }}

                                    {{ Form::hidden('lat',(isset($empresaApp))?$empresaApp->latitud:old('lat'),['id' =>'plat']) }}
                                    {{ Form::hidden('lng',(isset($empresaApp))?$empresaApp->longitud:old('lng'),['id' =>'plng']) }}
                        </div>
                        
                    </div>
                    <div class="col-md-12 form-group">
                            <span id="platm"></span>
                            <span id="plonm"></span>
                            <div id="map_canvas3" style="background-color: #e6dfde "></div>
                        </div>
                </div>
            </div>

        
         <div class="row">
                        <!-- Plean Detail -->
                <div class="price-in mart-15">
                  <button class="btn btn-primary btn-success" id="btnFormBasicApp" type="submit">Guardar Datos</button>
                </div>
    </div>
{{ Form::close() }}




