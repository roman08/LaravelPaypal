<div class="modal fade" id="myModalH" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Horario</h4>
      </div>
      <div class="modal-body" id="modal-bodyH" style="display: none;">
        
        
{{ Form::open( ['route' => ['horario.sucursal.save'], 'method'=>'POST', 'name' =>'frmEditHorarioSucusarl' , 'id' => 'frmEditHorarioSucusarl']) }}


    {{ Form::hidden('idsucursalhorario', null,['id' => 'idsucursalhorario'])}}
 
    <div style="background: #005000;" class="text-center">
        <h3  class="center-block" style=" color: #ffffff;  position :relative !important; 
       ">TU HORARIO</h3>
    </div>

    <div  class="text-center">
        <h4>En que horarios pueden encontrarte!!</h4>
    </div>
        
    
        <div class="panel panel-default">
            <div class="panel-heading ">Horario</div>
            <div class="panel-body ">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{Form::hidden('opcionElegidaSucursal',null,['id' => 'opcionElegidaSucursal'])}}
                        {{ Form::radio('opconSucursal', '1',  null, ['id' => 'personalizadoSucursal' ,'required' => 'required']) }}
                        {!!Form::label('entrega','Siempre Abierto (Abierto las 24 horas los 7 días de la semana.)',array('class' => 'radio-custom'))!!}
                    </li>
                    <li class="list-group-item">
                        {{ Form::radio('opconSucursal', '2',  null, ['id' => 'diasSucursal']) }}
                        {!!Form::label('entrega','Todo el Día (Abierto las 24 horas los días seleccionados.)',array('class' => 'radio-custom'))!!}
                    </li>
                    <li class="list-group-item">
                        {{ Form::radio('opconSucursal', '3',  null, ['id' => 'semanaSucursal']) }}
                        {!!Form::label('entrega','Horario Personalizado.',array('class' => 'radio-custom'))!!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default center-block" style="display: none" id="diasHorarioSucursal">
            <div class="panel-body center-block">
                <div style="background: #005000;" class="text-center" >
                    <h4  class="center-block" style=" color: #ffffff;  position :relative !important; ">Marca los días en que tu comercio estará abierto.</h4>
                </div>
                <div class="well center-block" style="max-width: 300px;">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '1', null, ['id' => 'LunesS']) }}
                            {!!Form::label('lunes','Lunes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '2', null, ['id' => 'MartesS']) }}
                            {!!Form::label('martes','Martes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '3', null, ['id' => 'MiercolesS']) }}
                            {!!Form::label('miercoles','Miércoles',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '4', null, ['id' => 'JuevesS']) }}
                            {!!Form::label('jueves','Jueves',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '5',null, ['id' => 'ViernesS']) }}
                            {!!Form::label('viernes','Viernes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '6',null, ['id' => 'SabadoS']) }}
                            {!!Form::label('sabadi','Sábado',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasSucursal[]', '7', null, ['id' => 'DomingoS']) }}
                            {!!Form::label('domingo','Domingo',array('class' => 'radio-custom'))!!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
   
        <div class="panel panel-default center-block" style="display: none" id="horarioQuebradoSucursal">
            <div class="panel-body center-block">
                <div style="background: #005000;" class="text-center">
                    <h4  class="center-block" style=" color: #ffffff;  position :relative !important; ">Marca los días y especifica las horas en que tu comercio estará abierto.</h4>
                </div>
                <div class="well center-block " >
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="col-md-5 text-center" >
                                <div style="background-color: #005000; color: #ffffff">
                                    <span >ENTRADA</span>
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <div style="background-color: #005000; color: #ffffff">
                                    <span >SALIDA</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5 text-center" >
                                <div style="background-color: #005000; color: #ffffff">
                                    <span >ENTRADA</span>
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <div style="background-color: #005000; color: #ffffff">
                                    <span >SALIDA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lunes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '1',  false, ['id' => 'LunesSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('Lunes','Lunes',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abrelunesSucursal1" id="abrelunesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="col-md-5">
                                    <select name="cierralunesSucursal1" id="cierralunesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                    <a href="#" id="spamlunesSucursal" class="sapmSucursal" style="display: none;" >
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
        
                                    <a href="#" id="spamlunesmenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                     
                                    {{Form::hidden('quebradolunesSucursal',null,['id' => 'quebradolunesSucursal'])}}
                                </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abrelunesSucursal2" id="abrelunesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierralunesSucursal2" id="cierralunesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Martes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '2',false, ['id' => 'MartesSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('domingo','Martes',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abremartesSucursal1" id="abremartesSucursal1" class="form-control selectSucursal" disabled>
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierramartesSucursal1" id="cierramartesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                   
                                    {{Form::hidden('quebradomartesSucursal',null,['id' => 'quebradomartesSucursal'])}}

                                    <a href="#" id="spammartesSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spammartesmenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abremartesSucursal2" id="abremartesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierramartesSucursal2" id="cierramartesSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Miercoles -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '3', false, ['id' => 'MiercolesSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('domingo','Miércoles',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abremiercolesSucursal1" id="abremiercolesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierramiercolesSucursal1" id="cierramiercolesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                   
                                     <a href="#" id="spammiercolesSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spammiercolesmenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>

                                    {{Form::hidden('quebradomiercolesSucursal',null,['id' => 'quebradomiercolesSucursal'])}}
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abremiercolesSucursal2" id="abremiercolesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierramiercolesSucursal2" id="cierramiercolesSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Jueves -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '4',  false, ['id' => 'JuevesSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('domingo','Jueves',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abrejuevesSucursal1" id="abrejuevesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierrajuevesSucursal1" id="cierrajuevesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamjuevesSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamjuevesmenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradojuevesSucursal',null,['id' => 'quebradojuevesSucursal'])}}
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abrejuevesSucursal2" id="abrejuevesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierrajuevesSucursal2" id="cierrajuevesSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Viernes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '5', false, ['id' => 'ViernesSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('domingo','Viernes',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abreviernesSucursal1" id="abreviernesSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierraviernesSucursal1" id="cierraviernesSucursal1" class="form-control selectSucursal" disabled>
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}" >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamviernesSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamviernesmenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradoviernesSucursal',null,['id' => 'quebradoviernesSucursal'])}}
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abreviernesSucursal2" id="abreviernesSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierraviernesSucursal2" id="cierraviernesSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Sabado -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '6', false, ['id' => 'SabadoSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('sabado','Sábado',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                   <select name="abresabadoSucursal1" id="abresabadoSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierrasabadoSucursal1" id="cierrasabadoSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamsabadoSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamsabadomenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradosabadoSucursal',null,['id' => 'quebradosabadoSucursal'])}}
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                               <select name="abresabadoSucursal2" id="abresabadoSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierrasabadoSucursal2" id="cierrasabadoSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Domingo -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('diasSucursalQuebrado[]', '7', false, ['id' => 'DomingoSucursal', 'class' => 'checkSucursal']) }}
                            {!!Form::label('domingo','Domingo',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-5">
                                <div class="col-md-5">
                                    <select name="abredomingoSucursal1" id="abredomingoSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierradomingoSucursal1" id="cierradomingoSucursal1" class="form-control selectSucursal" disabled >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamdomigoSucursal" class="sapmSucursal" style="display: none;">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamdomigomenosSucursal" class="sapmSucursal" style="display: none;">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradodomingoSucursal',null,['id' => 'quebradodomingoSucursal'])}}
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <select name="abredomingoSucursal2" id="abredomingoSucursal2" class="form-control selectSucursal" style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="cierradomingoSucursal2" id="cierradomingoSucursal2" class="form-control selectSucursal"  style="display: none;">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}">{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-success green " id="btnHorarioSucursalG" type="submit">Guardar datos</button>
      </div>
            {{Form::hidden('horarioSucursaeEdit',null,['id' => 'horarioSucursaeEdit'])}}
            {{Form::hidden('opcionhorarioSucursaeEdit',null,['id' => 'opcionhorarioSucursaeEdit'])}}
  {{ Form::close() }}
    </div>
  </div>
</div>


