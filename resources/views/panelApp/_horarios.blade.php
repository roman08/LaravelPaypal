
{{ Form::open( ['route' => ['horario.save'], 'method'=>'POST', 'name' => 'frmHorarios', 'id' => 'frmHorarios']) }}

    {{ Form::hidden('idcliente',$idcliente) }}
    {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}
    {{ Form::hidden('idplan',$idplan) }}
    {{ Form::hidden('idmun',$idmun) }}
    {{ Form::hidden('nombre',$nombre) }}
    {{ Form::hidden('idempreApp', ($empresaApp)? $empresaApp->idempresa : null)}}
    
    <div style="background: #005000;" class="text-center">
        <h3  class="center-block" style=" color: #ffffff;  position :relative !important; 
       ">TU HORARIO</h3>
    </div>

    <div  class="text-center">
        <h4>En que horarios pueden encontrarte!!</h4>
    </div>
        
    
        <div class="panel panel-success">
            <div class="panel-heading ">Horario</div>
            <div class="panel-body ">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{Form::hidden('opcionElegida',(isset($opcion) )? $opcion : 0,['id' => 'opcionElegida'])}}
                        {{ Form::radio('opcion', '1', (isset($opcion) && $opcion ==1 )? true : null, ['id' => 'personalizado', 'required' => 'required']) }}
                        {!!Form::label('entrega','Siempre Abierto (Abierto las 24 horas los 7 días de la semana.)',array('class' => 'radio-custom'))!!}
                    </li>
                    <li class="list-group-item">
                        {{ Form::radio('opcion', '2', (isset($opcion) && $opcion ==2 )? true : null, ['id' => 'dias']) }}
                        {!!Form::label('entrega','Todo el Día (Abierto las 24 horas los días seleccionados.)',array('class' => 'radio-custom'))!!}
                    </li>
                    <li class="list-group-item">
                        {{ Form::radio('opcion', '3', (isset($opcion) && $opcion == 3 )? true : null, ['id' => 'semana']) }}
                        {!!Form::label('entrega','Horario Personalizado.',array('class' => 'radio-custom'))!!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel panel-success center-block" style="display: none" id="diasHorario">
            <div class="panel-body center-block">
                <div style="background: #005000;" class="text-center" >
                    <h4  class="center-block" style=" color: #ffffff;  position :relative !important; ">Marca los días en que tu comercio estará abierto.</h4>
                </div>
                <div class="well center-block" style="max-width: 300px;">
                    <ul class="list-group checked-list-box">
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '1', (isset($lunes) && $lunes->opcion == 2)?true:null, ['id' => 'Lunes']) }}
                            {!!Form::label('lunes','Lunes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '2', (isset($martes) && $martes->opcion == 2)?true:null, ['id' => 'Martes']) }}
                            {!!Form::label('martes','Martes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '3', (isset($miercoles) && $miercoles->opcion == 2)?true:null, ['id' => 'Miercoles']) }}
                            {!!Form::label('miercoles','Miércoles',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '4', (isset($jueves) && $jueves->opcion == 2)?true:null, ['id' => 'Jueves']) }}
                            {!!Form::label('jueves','Jueves',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '5', (isset($vierne) && $vierne->opcion == 2)?true:null, ['id' => 'Viernes']) }}
                            {!!Form::label('viernes','Viernes',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '6', (isset($sabado) && $sabado->opcion == 2)?true:null, ['id' => 'Sabado']) }}
                            {!!Form::label('sabadi','Sábado',array('class' => 'radio-custom'))!!}
                        </li>
                        <li class="list-group-item">
                            {{ Form::checkbox('diasTotal[]', '7', (isset($domingo) && $domingo->opcion == 2)?true:null, ['id' => 'Domingo']) }}
                            {!!Form::label('domingo','Domingo',array('class' => 'radio-custom'))!!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
   
        <div class="panel panel-success center-block" style="display: none" id="horarioQuebrado">
            <div class="panel-body center-block">
                <div style="background: #005000;" class="text-center">
                    <h4  class="center-block" style=" color: #ffffff;  position :relative !important; ">Marca los días y especifica las horas en que tu comercio estará abierto.</h4>
                </div>
                <div class="well center-block " >
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="col-md-6 text-center" >
                                <div class="etiqueta"  style="background-color: #005000; color: #ffffff; display: none;">
                                    <span >ENTRADA</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="etiqueta" style="background-color: #005000; color: #ffffff; display: none;">
                                    <span >SALIDA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lunes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '1', (isset($lunes)&& $lunes->opcion == 3)? true : false, ['id' => 'LunesH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Lunes',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abrelunes1" id="abrelunes1" class="form-control selecthora" {{(isset($lunes)&& isset($lunes->turno_inicio) && $lunes->opcion == 3)? null : 'disabled' }}  >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($lunes)&& $lunes->turno_inicio == $h && $lunes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="col-md-5">
                                    <select name="cierralunes1" id="cierralunes1" class="form-control selecthora" {{(isset($lunes)&& isset($lunes->turno_fin) && $lunes->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($lunes)&& $lunes->turno_fin == $h && $lunes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                    <a href="#" id="spamlunes" class=" sapm" style="{{(isset($lunes)&& isset($lunes->turno_inicio) && !isset($lunes->turno_inicio_1) && $lunes->opcion == 3)? null : 'display: none;'}}" >
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
        
                                    <a href="#" id="spamlunesmenos" class=" sapm" style="{{(isset($lunes)&& isset($lunes->turno_inicio_1) && $lunes->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                     
                                    {{Form::hidden('quebradolunes',(isset($lunes)&& isset($lunes->turno_inicio_1) && $lunes->opcion == 3)?1:null,['id' => 'quebradolunes'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abrelunes2" id="abrelunes2" class="form-control selecthora" style="{{(isset($lunes)&& isset($lunes->turno_inicio_1) && $lunes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($lunes)&& $lunes->turno_inicio_1 == $h && $lunes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierralunes2" id="cierralunes2" class="form-control selecthora" style="{{(isset($lunes)&& isset($lunes->turno_fin_1) && $lunes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($lunes)&& $lunes->turno_fin_1 == $h && $lunes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Martes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '2', (isset($martes)&& $martes->opcion == 3 )? true : false, ['id' => 'MartesH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Martes',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abremartes1" id="abremartes1" class="form-control selecthora" {{(isset($martes)&& isset($martes->turno_inicio) && $martes->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($martes)&& $martes->turno_inicio == $h && $martes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierramartes1" id="cierramartes1" class="form-control selecthora" {{(isset($martes)&& isset($martes->turno_inicio) && $martes->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($martes)&& $martes->turno_fin == $h && $martes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                   
                                    {{Form::hidden('quebradomartes',(isset($martes)&& isset($martes->turno_inicio_1) && $martes->opcion == 3)?1:null,['id' => 'quebradomartes'])}}

                                    <a href="#" id="spammartes" class=" sapm" style="{{(isset($martes)&& isset($martes->turno_inicio) && !isset($martes->turno_inicio_1) && $martes->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spammartesmenos" class=" sapm" style="{{(isset($martes)&& isset($martes->turno_inicio_1) && $martes->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abremartes2" id="abremartes2" class="form-control selecthora" style="{{(isset($martes)&& isset($martes->turno_inicio_1) && $martes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($martes)&& $martes->turno_inicio_1 == $h && $martes->opcion == 3 ) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierramartes2" id="cierramartes2" class="form-control selecthora"  style="{{(isset($martes)&& isset($martes->turno_fin_1) && $martes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($martes)&& $martes->turno_fin_1 == $h && $martes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Miercoles -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '3', (isset($miercoles)&& $miercoles->opcion == 3 )? true : false, ['id' => 'MiercolesH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Miércoles',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abremiercoles1" id="abremiercoles1" class="form-control selecthora" {{(isset($miercoles)&& isset($miercoles->turno_inicio) && $miercoles->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($miercoles)&& $miercoles->turno_inicio == $h && $miercoles->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierramiercoles1" id="cierramiercoles1" class="form-control selecthora" {{(isset($miercoles)&& isset($miercoles->turno_inicio) && $miercoles->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($miercoles)&& $miercoles->turno_fin == $h && $miercoles->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                   
                                     <a href="#" id="spammiercoles" class=" sapm" style="{{(isset($miercoles)&& isset($miercoles->turno_inicio) && !isset($miercoles->turno_inicio_1) && $miercoles->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spammiercolesmenos" class=" sapm" style="{{(isset($miercoles)&& isset($miercoles->turno_inicio_1) && $miercoles->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>

                                    {{Form::hidden('quebradomiercoles',(isset($miercoles)&& isset($miercoles->turno_inicio_1) && $miercoles->opcion == 3)?1:null,['id' => 'quebradomiercoles'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abremiercoles2" id="abremiercoles2" class="form-control selecthora" style="{{(isset($miercoles)&& isset($miercoles->turno_inicio_1) && $miercoles->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($miercoles)&& $miercoles->turno_inicio_1 == $h && $miercoles->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierramiercoles2" id="cierramiercoles2" class="form-control selecthora"  style="{{(isset($miercoles)&& isset($miercoles->turno_fin_1) && $miercoles->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($miercoles)&& $miercoles->turno_fin_1 == $h && $miercoles->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Jueves -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '4', (isset($jueves)&& $jueves->opcion == 3 )? true : false, ['id' => 'JuevesH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Jueves',array('class' => 'radio-custom'))!!}</div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abrejueves1" id="abrejueves1" class="form-control selecthora" {{(isset($jueves)&& isset($jueves->turno_inicio) && $jueves->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($jueves)&& $jueves->turno_inicio == $h && $jueves->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierrajueves1" id="cierrajueves1" class="form-control selecthora" {{(isset($jueves)&& isset($jueves->turno_inicio) && $jueves->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($jueves)&& $jueves->turno_fin == $h && $jueves->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamjueves" class=" sapm" style="{{(isset($jueves)&& isset($jueves->turno_inicio) && !isset($jueves->turno_inicio_1) && $jueves->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamjuevesmenos" class=" sapm" style="{{(isset($jueves)&& isset($jueves->turno_inicio_1) && $jueves->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradojueves',(isset($jueves)&& isset($jueves->turno_inicio_1) && $jueves->opcion == 3)?1:null,['id' => 'quebradojueves'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abrejueves2" id="abrejueves2" class="form-control selecthora" style="{{(isset($jueves)&& isset($jueves->turno_inicio_1) && $jueves->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($jueves)&& $jueves->turno_inicio_1 == $h && $jueves->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierrajueves2" id="cierrajueves2" class="form-control selecthora"  style="{{(isset($jueves)&& isset($jueves->turno_fin_1) && $jueves->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($jueves)&& $jueves->turno_fin_1 == $h && $jueves->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Viernes -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '5', (isset($viernes)&& $viernes->opcion == 3 )? true : false, ['id' => 'ViernesH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Viernes',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abreviernes1" id="abreviernes1" class="form-control selecthora" {{(isset($viernes)&& isset($viernes->turno_inicio) && $viernes->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($viernes)&& $viernes->turno_inicio == $h && $viernes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierraviernes1" id="cierraviernes1" class="form-control selecthora" {{(isset($viernes)&& isset($viernes->turno_inicio) && $viernes->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($viernes)&& $viernes->turno_fin == $h && $viernes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamviernes" class=" sapm" style="{{(isset($viernes)&& isset($viernes->turno_inicio) && !isset($viernes->turno_inicio_1) && $viernes->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamviernesmenos" class=" sapm" style="{{(isset($viernes)&& isset($viernes->turno_inicio_1) && $viernes->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradoviernes',(isset($viernes)&& isset($viernes->turno_inicio_1) && $viernes->opcion == 3)?1:null,['id' => 'quebradoviernes'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abreviernes2" id="abreviernes2" class="form-control selecthora" style="{{(isset($viernes)&& isset($viernes->turno_inicio_1) && $viernes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($viernes)&& $viernes->turno_inicio_1 == $h && $viernes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierraviernes2" id="cierraviernes2" class="form-control selecthora"  style="{{(isset($viernes)&& isset($viernes->turno_fin_1) && $viernes->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($viernes)&& $viernes->turno_fin_1 == $h && $viernes->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Sabado -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '6', (isset($sabado)&& $sabado->opcion == 3 )? true : false, ['id' => 'SabadoH', 'class' => 'check']) }}
                            {!!Form::label('sabado','Sábado',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                   <select name="abresabado1" id="abresabado1" class="form-control selecthora" {{(isset($sabado)&& isset($sabado->turno_inicio) && $sabado->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($sabado)&& $sabado->turno_inicio == $h && $sabado->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierrasabado1" id="cierrasabado1" class="form-control selecthora" {{(isset($sabado)&& isset($sabado->turno_inicio) && $sabado->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($sabado)&& $sabado->turno_fin == $h && $sabado->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamsabado" class=" sapm" style="{{(isset($sabado)&& isset($sabado->turno_inicio) && !isset($sabado->turno_inicio_1) && $sabado->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamsabadomenos" class=" sapm" style="{{(isset($sabado)&& isset($sabado->turno_inicio_1) && $sabado->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradosabado',(isset($sabado)&& isset($sabado->turno_inicio_1) && $sabado->opcion == 3)?1:null,['id' => 'quebradosabado'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                               <select name="abresabado2" id="abresabado2" class="form-control selecthora" style="{{(isset($sabado)&& isset($sabado->turno_inicio_1) && $sabado->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($sabado)&& $sabado->turno_inicio_1 == $h && $sabado->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierrasabado2" id="cierrasabado2" class="form-control selecthora"  style="{{(isset($sabado)&& isset($sabado->turno_fin_1) && $sabado->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($sabado)&& $sabado->turno_fin_1 == $h && $sabado->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Domingo -->
                    <div class="row" style="padding-top: 10px">
                        <div class="col-md-2">
                            {{ Form::checkbox('dias[]', '7', (isset($domingo)&& $domingo->opcion == 3 )? true : false, ['id' => 'DomingoH', 'class' => 'check']) }}
                            {!!Form::label('domingo','Domingo',array('class' => 'radio-custom'))!!}
                        </div>
                        <div class="col-md-4">
                                <div class="col-md-5">
                                    <select name="abredomingo1" id="abredomingo1" class="form-control selecthora" {{(isset($domingo)&& isset($domingo->turno_inicio) && $domingo->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($domingo)&& $domingo->turno_inicio == $h && $domingo->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="cierradomingo1" id="cierradomingo1" class="form-control selecthora" {{(isset($domingo)&& isset($domingo->turno_inicio) && $domingo->opcion == 3)? null : 'disabled' }} >
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($domingo)&& $domingo->turno_fin == $h && $domingo->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">

                                     <a href="#" id="spamdomigo" class=" sapm" style="{{(isset($domingo)&& isset($domingo->turno_inicio) && !isset($domingo->turno_inicio_1) && $domingo->opcion == 3)? null : 'display: none;'}}">
                                         <span  class="glyphicon glyphicon-plus" title="Agregar horario quebrado"></span> 
                                    </a>
                                    <a href="#" id="spamdomigomenos" class=" sapm" style="{{(isset($domingo)&& isset($domingo->turno_inicio_1) && $domingo->opcion == 3)? null : 'display: none;'}}">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                    {{Form::hidden('quebradodomingo',(isset($domingo)&& isset($domingo->turno_inicio_1) && $domingo->opcion == 3)?1:null,['id' => 'quebradodomingo'])}}
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <select name="abredomingo2" id="abredomingo2" class="form-control selecthora" style="{{(isset($domingo)&& isset($domingo->turno_inicio_1) && $domingo->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($domingo)&& $domingo->turno_inicio_1 == $h && $domingo->opcion == 3) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="cierradomingo2" id="cierradomingo2" class="form-control selecthora"  style="{{(isset($domingo)&& isset($domingo->turno_fin_1) && $domingo->opcion == 3)? null : 'display: none;'}}">
                                        @foreach($horarios as $h => $key)
                                            <option value="{{$h}}"
                                                @if(isset($domingo)&& $domingo->turno_fin_1 == $h&& $domingo->opcion == 3 ) selected @endif
                                            >{{$key}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{Form::hidden('diasSeleccionados',($contadorDiasChek == 0)? null: $contadorDiasChek,['id' => 'diasSeleccionados'])}}


        

    <div class="row">
        <div class="price-in mart-15">
            <button class="btn btn-success green " id="btnHorarios" type="submit">Guardar datos</button>
        </div>
    </div>
{{ Form::close() }}




