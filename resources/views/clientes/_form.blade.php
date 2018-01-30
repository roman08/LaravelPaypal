
				{{ Form::model($cliente, ['route' => ['usuario.update', $user->id], 'method'=>'PUT', 'name' => 'frmDatosCliente']) }}
				    {{ Form::hidden('id',$iduser,['class'=>'form-control', 'id' =>'id']) }}
				    {{ csrf_field() }}
				    {{ Form::hidden('idcliente',$cliente->idcliente)}}
		                <div class="tab-content">
		                	<!-- div datos personales -->
		                    <div class="tab-pane fade active in" id="profile">
		                    	<div class="container" style="padding-top: 50px;">
			                        <div class="row">
							            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
							                <div class="form-group input full {{ $errors->has('nombre') ? ' has-error' : '' }}">
												{!!Form::label('nombre','Nombre')!!}
							                    {!!Form::text('nombre', $cliente->nombre,['class'=>'form-control', 'id' => 'nombre', 'autocomplete'=>'off', 'placeholder' => 'Nombre', 'required' => 'required','maxlength' => 50])!!}
							                    <div class="validation"></div>
							                </div>
							            </div>
							            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
							                <div class="form-group input full {{ $errors->has('titulo') ? ' has-error' : '' }}">
							                	{!!Form::label('titulo','Título')!!}
							                	{{ Form::select('titulo', [ 'Ing.'=>'Ing.', 'Lic.'=>'Lic.', 'Srta.'=>'Srta.', 'Sra.'=>'Sra.', 'Joven'=>'Joven', 'Sr.'=>'Sr.'], old('titulo'), ['class'=>'form-control']) }}
							         
							                   
							                    <div class="validation"></div>
							                </div>
							            </div>
							        </div>
							        <div class="row">
							        	<div class="col-md-6 col-sm-6 col-xs-12 left form-group">
							                <div class="form-group input full ">
							                	{!!Form::label('mail','Correo')!!}
							                	{!!Form::text('mail', $cliente->mail,['class'=>'form-control', 'id' => 'mails', 'autocomplete'=>'off', 'placeholder' => 'usuario@dominio.com','maxlength' => 40, 'readonly' => 'readonly'])!!}
												
										            <span id="tagValido" style="display: none;">
										                <strong><h6 style="color: red">Formarto no valido</h6></strong>
										            </span>
							                </div>
							            </div>
							            <div class="col-md-6 col-sm-6 col-xs-12 left form-group"> 
							                <div class="form-group input full {{ $errors->has('telefono') ? ' has-error' : '' }}">
							                	{!!Form::label('telefono','Teléfono')!!}<span>(Ejemplo: 5550055555)</span>
							                	{!!Form::text('telefono',null,['class'=>'form-control numerico', 'id' => 'telefono', 'autocomplete'=>'off', 'placeholder' => 'Teléfono','maxlength' => 12])!!}
							                    <div class="validation"></div>
							                </div>     
							            </div>
									</div>
			                       	<div class="row">
							          	<div class="col-md-6 col-sm-6 col-xs-12 left form-group">
							          		{!!Form::label('codigo_postal','Código Postal')!!}
							                	{!!Form::text('codigo_postal', (isset($cliente->codigo_postal))? $cliente->codigo_postal:null,['class'=>'form-control numerico cpp', 'autocomplete'=>'off', 'placeholder' => 'Código postal','maxlength' => 6, 'autocomplete' => 'off' ])!!}   
							                    <div class="validation"></div>
							            </div>
							            <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
							            	{!!Form::label('rfc','RFC')!!}
							            	{!!Form::text('rfc',null,['class'=>'form-control', 'id' => 'rfc', 'autocomplete'=>'off', 'placeholder' => 'RFC del cliente', 'autocomplete' => 'off','maxlength' => 15 ])!!}
							                <div class="validation"></div>
							            </div>
							        </div>
							        <div class="row">
							        	<div class="col-md-12 col-sm-12 col-xs-12 left form-group">
							        		{!!Form::label('direccion','Dirección')!!}
							                	{!!Form::text('direccion', null,['class'=>'form-control', 'id' => 'direccion', 'autocomplete'=>'off', 'placeholder' => 'Direccion del cliente', 'autocomplete' => 'off' ,'maxlength' => 200])!!}
												@if ($errors->has('direccion'))
										            <span class="help-block">
										                <strong>{{ $errors->first('direccion') }}</strong>
										            </span>
				                                 @endif
							            </div>
									</div>
									
						            <div class="row">
						             	<div class="col-md-6 col-sm-6 col-xs-12 left form-group">
						             		{!!Form::label('estado_id','Estado')!!}
						             		<select name="estado_id" id="estado_id" class="form-control">
										        <option value="">Seleccione un estado</option>
										        @foreach($estados as $estado)
										            <option value="{{$estado->idestado}}"
										            	@if(isset($cliente->idestado) && $cliente->idestado == $estado->idestado)  selected @endif  >
										                {{$estado->nombre}}
										            </option>
										        @endforeach
											</select>
												@if ($errors->has('estado'))
			                                        <span class="help-block">
			                                            <strong>{{ $errors->first('estado') }}</strong>
			                                        </span>
			                                    @endif			             		
						             	</div>
										
						             	<div class="col-md-6 col-sm-6 col-xs-12 left form-group">
						             		{!!Form::label('municipios','Municipio')!!}
						             		<select name="municipio_id" id="municipio_id" class="form-control">
										        <option value="">Seleccione un municipio</option>
										     	@foreach($municipios as $m => $k)
										            <option value="{{$m}}"
										            @if(isset($cliente->idmunicipio) && $cliente->idmunicipio == $m)  selected @endif>
										                {{$k}}
										            </option>
										        @endforeach
											</select>
												@if ($errors->has('ciudad'))
			                                        <span class="help-block">
			                                            <strong>{{ $errors->first('ciudad') }}</strong>
			                                        </span>
			                                    @endif
						             	</div>
						            </div>
			                    </div>
							</div>

							<!-- div datos fiscales -->
		                


		                <div class="form-group">
					        <div class="col-md-6 center-element">
					            <button type="submit" id="btnDatosC" class="btn btn-primary btn-success"  >Guardar</button>
					        </div>
    					</div>    
		        
		    	</div>
        {{ Form::close() }}
<p class="pm-staff-profile-title"></p>



