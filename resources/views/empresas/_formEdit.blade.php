<div class="panel panel-success">
<div class="panel-heading">Editar Empresa</div>
  <div class="panel-body">
    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 left ">
            <div class=" input full {{ $errors->has('nombre') ? ' has-error' : '' }}">
                {!!Form::label('nombre','Nombre de la empresa')!!}
                {!!Form::text('nombre',(isset($empresafiscal))?$empresafiscal->empresa: old('nombre'),[
                    'class'=>'form-control', 
                    'id' => 'nombre', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba el nombre de su comercio', 
                    'required' => 'required',
                    'maxlength' => 100])!!}
            </div>
        </div>
    </div>       

    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 left ">
            <div class=" input full {{ $errors->has('razon_social') ? ' has-error' : '' }}">
                {!!Form::label('razon_social','Razón social')!!}
                {!!Form::text('razon_social',(isset($empresafiscal))?$empresafiscal->razon_social : old('razon_social'),[
                    'class'=>'form-control', 
                    'id' => 'razon_social', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba la razón social registrada en SAT', 
                    'required' => 'required',
                    'maxlength' => 150])!!}
            </div>
        </div>
    </div>       

    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 left ">
            <div class=" input full {{ $errors->has('rfc') ? ' has-error' : '' }}">
                {!!Form::label('rfc','RFC')!!}
                {!!Form::text('rfc',(isset($empresafiscal))?$empresafiscal->rfc : old('rfc'),[
                    'class'=>'form-control', 
                    'id' => 'rfc', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba el RFC registrado en SAT', 
                    'required' => 'required',
                    'maxlength' => 20])!!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 left ">
            <div class=" input full {{ $errors->has('domicilio_fiscal') ? ' has-error' : '' }}">
                {!!Form::label('domicilio_fiscal','Dirección Fiscal')!!}
                {!!Form::text('domicilio_fiscal',(isset($empresafiscal))?$empresafiscal->domicilio_fiscal : old('domicilio_fiscal'),[
                    'class'=>'form-control',
                    'id' => 'address', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba su dirección con calle, número,colonia, código postal, ciudad y estado ', 
                    'required' => 'required',
                    'maxlength' => 100])!!}
            </div>
        </div>
    </div>  
    
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 left ">
            <div class=" input full {{ $errors->has('mail') ? ' has-error' : '' }}">
                {!!Form::label('mail','Correo')!!}
                {!!Form::text('mail',(isset($empresafiscal))?$empresafiscal->mail : old('mail'),[
                    'class'=>'form-control', 
                    'id' => 'mail', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba el correo electrónico de su comercio', 
                    'maxlength' => 40])!!}
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 left ">
            <div class=" input full {{ $errors->has('telefono') ? ' has-error' : '' }}">
                {!!Form::label('telefono','Teléfono')!!}
                {!!Form::text('telefono',(isset($empresafiscal))?$empresafiscal->telefono : old('telefono'),[
                    'class'=>'form-control numerico', 
                    'id' => 'telefono', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba el teléfono de su comercio', 
                    'required' => 'required',
                    'maxlength' => 12,
                    'minlength' => 10])!!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 left ">
            <div class=" input full {{ $errors->has('contacto') ? ' has-error' : '' }}">
                {!!Form::label('contacto','Contacto')!!}
                {!!Form::text('contacto',(isset($empresafiscal))?$empresafiscal->contacto : old('contacto'),[
                    'class'=>'form-control', 
                    'id' => 'contacto', 
                    'autocomplete'=>'off', 
                    'placeholder' => 'Escriba el nombre del contacto', 
                    'required' => 'required',
                    'maxlength' => 60])!!}
            </div>
        </div>
    </div>
  </div>
                               <div class="text-center form-group" >
                                <button class="btn btn-primary btn-success" type="submit">Actualizar</button>
                            </div>
</div> 