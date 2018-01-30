	            <!-- Default panel contents -->
{!!Form::hidden('idtrans',$idt)!!}
{!!Form::hidden('idempresa',$idempresa)!!}


<div class="panel panel-success">
    <!-- Default panel contents -->
    <div class="panel-heading">Detalles de la compra</div>
    {!!Form::hidden('idtrans',$idt)!!}
    {!!Form::hidden('idempresa',$idempresa)!!}
    <div class="container" style="padding-top: 10px">
        <div class="row">
            <div class="col-md-4" >
                    <div class="panel panel-success">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Plan Contratado</div>
                        <div class="col-item" style="padding-top: 10px">
                            <div class="photo">
                                <img src="/img/planes/@if($plan->tipoplan == 'Plan Básico'){{'basico/basico'}}@elseif ($plan->tipoplan == 'Plan Plus'){{'plus/plus'}}@else($plan->tipoplan == 'Plan Premium'){{'premium/premium'}}@endif.png" class='img-responsive img' alt='a' style="width: 250px; height: 250px;">
                            </div>
                            <div class="info"  style="background: #f5f5ef; padding-top: 5px" >
									<div class="separator price col-md-12 text-center">
                                        <h5>
                                            <strong>${{ number_format( $plan->precio, 2, '.', ',')  }} M.N. mensuales</strong>
                                        </h5>
                                       
                                    </div>

                                    <div class="separator price col-md-12 text-center" >
                                        <h5>
                                            <strong>Meses Contratados</strong> 
                                        </h5>
                                        <spam >{{ $meses}}</spam>
                                    </div>
                                    
                                    <div class="separator price col-md-12 text-center">
                                        <h5>
                                            <strong>Empresa</strong> 
                                        </h5>
                                        <spam >{{$empresa}}</spam>
                                    </div>

                                    <div class="separator price col-md-12 text-center">
                                        <h5>
                                            <strong>Promoción</strong> 
                                        </h5>
                                        <spam >1 mes <strong style="color: #C00">gratis</strong> Adicional</spam>
                                    </div>
                                <div class="separator clear-left text-center">
                                	<h5>
                                            <strong>Total a pagar:</strong> 
                                        </h5>
                                        <spam > ${{ number_format( $totapago, 2, '.', ',')  }} M.N.</spam>
                                   
                                </div>
                                <div class="clearfix">
                                </div>
                                <p class="pm-staff-profile-title"></p>
                            </div>
                        </div>
                    </div>
            </div>

                <!-- Terminos -->
            <div class="col-md-8">
                        <div class="panel panel-success">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Términos y Condiciones</div>
                        
                            <!-- List group -->
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a id="terminos" href="#" ><span class="glyphicon glyphicon-eye-open"></span> Ver Términos y condiciones </a>
                                    <div class="material-switch pull-right">
                                        <input required id="termino" name="termino" type="checkbox"/>
                                        <label for="termino" class="label-primary"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a id="privacidadm" href="#"><span class="glyphicon glyphicon-eye-open"></span> Ver Aviso de privacidad </a>
                                    <div class="material-switch pull-right">
                                        <input required id="privacidad" name="privacidad" type="checkbox"/>
                                        <label for="privacidad" class="label-primary"></label>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>      
                        <div class="panel panel-success">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Seleccione un método de pago</div>
                        
                            <!-- List group -->
                            <div class="paymentWrap">
                                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                    <label class="btn paymentMethod active">
                                        <div class="method visa"></div>
                                            <input type="radio" required name="pago" value="transferencia" checked> 
                                    </label>
                                    <label class="btn paymentMethod">
                                        <div class="method master-card"></div>
                                            <input type="radio"  name="pago" value="deposito" > 
                                    </label>
                                     <label class="btn paymentMethod">
                                        <div class="method paypal"></div>
                                            <input type="radio"  name="pago" value="paypal" > 
                                    </label>
                                </div>        
                            </div>
                            <div class="text-center" >
                  				<button class="btn btn-primary btn-success" type="submit">COMPRAR PLAN</button>
                			</div>
                			<p class="pm-staff-profile-title"></p>
                        </div>
            </div>
        </div>
    </div>
</div>