<div  class="text-center">
    <h4>Para publicar debe capturar al menos una clasificación</h4>
</div>
<div class="form-group price-in mart-15">
    <button href="#demo" data-toggle="collapse" class="btn btn-primary btn-success" id="addcategoria" >Agregar Clasificación</button>
</div>
          
{{ Form::open( ['route' => ['categoria.save'], 'method'=>'POST', 'id' => 'frmClasificacion']) }}
    {{ csrf_field() }}
    {{ Form::hidden('idempresa',$idempresa,['id' => 'idempresa']) }}

    <div id="demo" class="collapse">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div  class="col-md-6 col-sm-6 col-xs-12 left ">
                        <div class="form-group input full {{ $errors->has('numero_tarjeta') ? ' has-error' : '' }}">
                             {!!Form::label('categoria','Categorías:')!!}
                            <select name="categoria" id="clasificacion" class="form-control">
                                <option value="">Seleccione una  clasificación </option>
                                @foreach($categoria as $c)
                                    <option value="{{$c->idclasificacion}}">{{$c->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 left ">
                        <div class="form-group input full {{ $errors->has('banco') ? ' has-error' : '' }}">
                            {!!Form::label('subcategoria','SubCategorías')!!}
                            <select name="subcategoria" id="subcategoria" class="form-control">
                                <option value="">Seleccione una Subclasificación</option>  
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="price-in mart-15">
                        <button class="btn btn-primary btn-success" id='guardarClass' type="submit">Guardar Clasificación</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{ Form::close()}}
    <div class="panel panel-default" id="tbClasificacion">
        <div class="panel-body">
            <div class="col-md-12 table-responsive">
                <table id="tab"  class="table table-hover " >
                    <thead>
                        <td>#</td>
                        <td>Clasificación</td>
                        <td>SubCategorías</td>
                        <td>Acciones</td>
                    </thead>
                    <tbody>
                        @php($count = 0)
                        
                        @if(isset($categoriasG))
                            @foreach($categoriasG as $cg)
                                @php($count++)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$cg->categoria}}</td>
                                    <td>{{$cg->subcategoria}}</td>
                                    <td>

                                        <i class="glyphicon glyphicon-trash "></i><a class="registros deleteClass" id="{{$cg->idsubclasificacion}}" href="{{route('categoria.destroy',['id'=>$cg->id])}}"  title="Eliminar categoria">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ Form::hidden('count',$count,['id' => 'count']) }}
                {{ Form::hidden('registros',null,['id' => 'registros']) }}

            </div>
        </div>
    </div>
