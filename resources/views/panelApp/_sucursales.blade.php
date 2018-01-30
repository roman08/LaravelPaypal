
   <div style="background: #005000;" class="text-center">
        <h3  class="center-block" style=" color: #ffffff;  position :relative !important; 
       ">TUS SUCURSALES</h3>
    </div>

    <div  class="text-center">
        <h4>Cuéntanos donde más encontrarte</h4>
    </div>
    <div class="form-group" style="display: flex; justify-content: center;">
        <!--         <a href="{{route('sucursales.index')}}" class="btn btn-success"> Agregar Sucursal</a>
 -->
        <button type="button" class="btn btn-primary btn-success"  id="nuevaSucursal" >
            Agregar Sucursal
        </button>

    </div>
<div class="table-responsive" id="tbSucursales">  
        <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <table  class="table table-hover datatable-no-responsive"  >
                    <thead>                               
                        <td>#</td>
                        <td>Municipio</td>
                        <td>Sucursal</td>
                        <td>Teléfono</td>
                        <td>Acciones</td>
                    </thead>
                    <tbody>@php($count = 0)
                        @if($sucursales)
                            
                            @foreach($sucursales as $s)
                                @php($count++)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{ $s->municipio }}</td>
                                    <td>{{ $s->sucursal }}</td>
                                    <td>{{ $s->telefono}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <a class="edit" href="{{$s->idsucursal}}" id="{{$s->idsucursal}}" title="Editar Sucursal"><i class="glyphicon glyphicon-pencil"></i> </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{route('sucursal.destroy',['id'=>$s->idsucursal])}}" class="deleteSucursal" title="Eliminar sucursal"><i class="glyphicon glyphicon-trash"></i> </a>
                                            </div>
                                            <div class="col-md-4 ">
                                                <a href="#" class="Horario"  id="{{$s->idsucursal}}" title="Agregar Horario"><i class="glyphicon glyphicon-time"></i> </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{Form::hidden('countSucursales',$count,['id' => 'countSucursales'])}}
                {{Form::hidden('TipoPlan',$empresafiscal->tipoplan,['id' => 'TipoPlan'])}}
            </div>
        </div>
    </div>

</div>

