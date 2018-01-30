<fieldset> 
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 left ">
			<div class=" input full {{ $errors->has('nombre') ? ' has-error' : '' }}">
				{!!Form::label('nombre','Nombre de la empresa')!!}
				{!!Form::text('nombre', (isset($_POST['nombre']))?$_POST['nombre']:null,[
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
				{!!Form::text('razon_social',old('razon_social'),[
					'class'=>'form-control', 
					'id' => 'razon_social', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba la razón social registrada en SAT', 
					'required' => 'required',
					'maxlength' => 150])!!}
				<div class="validation"></div>
			</div>
		</div>
	</div>	     

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 left ">
			<div class=" input full {{ $errors->has('rfc') ? ' has-error' : '' }}">
				{!!Form::label('rfc','RFC')!!}
				{!!Form::text('rfc',old('rfc'),[
					'class'=>'form-control', 
					'id' => 'rfc', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba el RFC registrado en SAT', 
					'required' => 'required',
					'maxlength' => 20])!!}
				<div class="validation"></div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-10 col-sm-10 col-xs-12 left ">
			<div class=" input full {{ $errors->has('domicilio_fiscal') ? ' has-error' : '' }}">
				{!!Form::label('domicilio_fiscal','Dirección Fiscal')!!}
				{!!Form::text('domicilio_fiscal',old('domicilio_fiscal'),[
					'class'=>'form-control',
					'id' => 'address', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba su dirección con calle, número,colonia, código postal, ciudad y estado ', 
					'required' => 'required',
					'maxlength' => 100])!!}
				{{ Form::hidden('lat',old('lat'),['id' =>'lat']) }}
				{{ Form::hidden('lng',old('lng'),['id' =>'lng']) }}

				<div class="validation"></div>
			</div>
		</div>
	</div>	
	
	<div class="form-group">
		<div class="col-md-6 col-sm-6 col-xs-12 left ">
			<div class=" input full {{ $errors->has('mail') ? ' has-error' : '' }}">
				{!!Form::label('mail','Correo')!!}
				{!!Form::text('mail',old('mail'),[
					'class'=>'form-control', 
					'id' => 'mailEmp', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba el correo electrónico de su comercio', 
					'maxlength' => 40])!!}
				<span id="tagValidoEmp" style="display: none;">
					<strong><h4 style="color: red">Formato no válido</h4></strong>
				</span>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 left ">
			<div class=" input full {{ $errors->has('telefono') ? ' has-error' : '' }}">
				{!!Form::label('telefono','Teléfono')!!}
				{!!Form::text('telefono',old('telefono'),[
					'class'=>'form-control numerico', 
					'id' => 'telefono', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba el teléfono de su comercio', 
					'required' => 'required',
					'maxlength' => 12,
					'minlength' => 10])!!}
				<div class="validation"></div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 left ">
			<div class=" input full {{ $errors->has('contacto') ? ' has-error' : '' }}">
				{!!Form::label('contacto','Contacto')!!}
				{!!Form::text('contacto',old('contacto'),[
					'class'=>'form-control', 
					'id' => 'contacto', 
					'autocomplete'=>'off', 
					'placeholder' => 'Escriba el nombre del contacto', 
					'required' => 'required',
					'maxlength' => 60])!!}
				<div class="validation"></div>
			</div>
		</div>
	</div>
</fieldset>