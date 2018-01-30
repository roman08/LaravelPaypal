
        {{ Form::model($cliente, ['route' => ['tarjeta.save', $user->id], 'method'=>'POST']) }}
            {{ Form::hidden('id',$iduser,['class'=>'form-control', 'id' =>'id']) }}
            {{ csrf_field() }}
            {{ Form::hidden('idcliente',$cliente->idcliente)}}
                                <div class="container" style="padding-top: 50px;">
                                    
                                    <a href="#demo" data-toggle="collapse" class="btn btn-block btn-lg btn-success" ><span class="glyphicon glyphicon-credit-card"></span> Agregar tarjeta</a>
                                    <div id="demo" class="collapse">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('numero_tarjeta') ? ' has-error' : '' }}">
                                                            {!!Form::label('numero_tarjeta','Número de tarjeta')!!}
                                                            {!!Form::text('numero_tarjeta',null,[
                                                                'class'=>'form-control',
                                                                'id' => 'numero_tarjeta', 
                                                                'autocomplete'=>'off', 
                                                                'placeholder' => 'Número de tarjeta',
                                                                'maxlength' => 19,
                                                                'minlength' => 19])!!}
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('banco') ? ' has-error' : '' }}">
                                                            {!!Form::label('banco','Banco')!!}
                                                            {!!Form::text('banco',null,['class'=>'form-control', 'id' => 'banco', 'autocomplete'=>'off', 'placeholder' => 'Nombre banco'])!!}
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('titular') ? ' has-error' : '' }}">
                                                            {!!Form::label('titular','Titutlar de la tarjeta')!!}
                                                            {!!Form::text('titular',null,['class'=>'form-control', 'id' => 'titular', 'autocomplete'=>'off', 'placeholder' => 'Nombre del titular'])!!}
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('titular') }}</strong>
                                                                </span>
                                                             @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('tipo') ? ' has-error' : '' }}">
                                                            {!!Form::label('tipo','Tipo de tarjeta')!!}
                                                            {{ Form::select('tipo', [ 'visa'=>'Visa', 'mastercard'=>'MasterCard'], old('tipo'), ['class'=>'form-control']) }}
                                                            @if ($errors->has('tipo'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('tipo') }}</strong>
                                                                </span>
                                                             @endif
                                                        </div>     
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('mes') ? ' has-error' : '' }}" >
                                                            {!!Form::label('mes','Mes de vencimiento')!!}
                                                            {{ Form::select('mes', [ '01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12'], old('mes'), ['class'=>'form-control']) }}
                                                                @if ($errors->has('mes'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('mes') }}</strong>
                                                                    </span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('anio') ? ' has-error' : '' }}" >
                                                            {!!Form::label('anio','Año de vencimiento')!!}
                                                            {!!Form::text('anio', null,['class'=>'form-control numerico', 'id' => 'anio', 'autocomplete'=>'off', 'placeholder' => 'Año vencimiento ','minlength'=>'2','maxlength'=>'2', 'data-msg' => 'Ingrese 2 caracteres', 'autocomplete' => 'off' ])!!}
                                                                @if ($errors->has('anio'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('anio') }}</strong>
                                                                    </span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 left form-group">
                                                        <div class="form-group input full {{ $errors->has('cpp') ? ' has-error' : '' }}" >
                                                            {!!Form::label('cpp','Código postal')!!}
                                                            {!!Form::text('cpp', null,['class'=>'form-control', 'id' => 'cpp', 'autocomplete'=>'off', 'placeholder' => 'Código postal ','minlength'=>'6','maxlength'=>'6', 'data-msg' => 'Ingrese 6 caracteres', 'autocomplete' => 'off' ])!!}
                                                                @if ($errors->has('cpp'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('cpp') }}</strong>
                                                                    </span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-group text-center">
                                                        <button type="submit"  id="tdatos" class="btn btn-primary btn-success" >Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="pm-staff-profile-title"></p>


    <div class="form-group">
                <table  id="tab" class="table table-hover " >
                    <thead>                               
                        <td>#</td>
                        <td class="none">No. tarjeta</td>
                        <td>Banco</td>
                        <td class="none">Titular de la tarjeta</td>
                        <td>Tipo de tarjeta</td>
                        <td>Mes de expiración</td>
                        <td>Año de expiración</td>
                        <td>Código postal</td>
                        <td></td>
                      
                    </thead>
                    <tbody>
                         @php( $index= 1)
                        @foreach($tarjetas as $t)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{ $t->num_tarjeta }}</td>
                            <td>{{ $t->banco }}</td>
                            <td>{{ $t->titular }}</td>
                            <td>{{ $t->tipo }}</td>
                            <td>{{ $t->mes }}</td>
                            <td>{{ $t->anio }}</td>
                            <td>{{ $t->cp }}</td>
                            <td><a href="{{route('tarjeta.delete',['id'=>$t->id,])}}" title="Eliminar tarjeta"><i class="glyphicon glyphicon-trash"></i> </a>
                                <a href="{{ route('tarjeta.edit',['id'=>$t->id]) }}" title="Editar tarjeta"><i class="glyphicon glyphicon-pencil"></i> </a></td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>




                                </div>
        {{ Form::close() }}
