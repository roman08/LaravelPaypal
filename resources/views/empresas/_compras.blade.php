<fieldset style="padding-top: 10px"> 
	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 center ">
			<h4>Plan a contratar</h4>
		</div>
	</div>	     

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 left ">
			<div class=" input full {{ $errors->has('razon_social') ? ' has-error' : '' }}">
				
				<select name="plan" id="plan" class="form-control">
					@foreach($planes as $p)
						<option value="{{$p->idplan}} "
							@if(isset($id) && $id == $p->idplan) selected @endif>{{$p->tipoplan}}</option>
					@endforeach
				</select>
				
			</div>
		</div>
	</div>	   

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 left ">
			<div class="heading pull-right">
                <div class="pm-staff-profile-container " >
                    <div class="pm-staff-profile-image-wrapper text-center">
                    	 <img id="logo" src="/img/planes/@if($plan->tipoplan == 'Plan Básico'){{'basico/basico'}}@elseif ($plan->tipoplan == 'Plan Plus'){{'plus/plus'}}@else($plan->tipoplan == 'Plan Premium'){{'premium/premium'}}@endif.png" class="img-responsive" alt="" style="height: 60%; width: 60%; padding-top: 10px;">
                    </div>
                </div>
            </div>
		</div>
	</div>	      

	<div class="form-group">
		
			<div class=" input full {{ $errors->has('rfc') ? ' has-error' : '' }}">
				{!!Form::label('precio','Precio unitario',['class' => ' control-label col-md-6'])!!}
				<div class="col-md-6">
					<h5><span id="unitario">${{ number_format( $plan->precio, 2, '.', ',')  }} M.N. mensual.</span></h5>
					{!!Form::hidden('precio',$plan->precio)!!}
				</div>
				<div class="validation"></div>
			</div>
	</div>	     

	<div class="form-group">
		
			<div class=" input full {{ $errors->has('meses') ? ' has-error' : '' }}">
				{!!Form::label('meses','Meses a contratar',['class' => 'col-md-7 control-label','required' => 'required'])!!}
				<div class="col-md-5">
					<select name="meses" id="meses" class="form-control">
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10 </option>
						<option value="11">11 </option>
						<option value="12">12 </option>
					</select>
				
				</div>
			</div>
		
	</div>

	<div class="form-group">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div style="text-align: justify;" class=" input full {{ $errors->has('contacto') ? ' has-error' : '' }}">
				{!!Form::label('total','Total',['class' => 'col-md-7 control-label'])!!}
				<div class="col-md-5">
					<h5><span id="deuda">${{ number_format( $plan->precio, 2, '.', ',')  }} </span>M.N.</h5>
				</div>
			</div>
		</div>  
          <button id="btnEmpCompra" type="submit" class="btn btn-primary btn-success btn-block" >Comprar</button>
	</div>
</fieldset> 