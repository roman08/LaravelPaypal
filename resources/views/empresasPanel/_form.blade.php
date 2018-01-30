	<div class="form-group" style="display: flex; justify-content: center;">
		<h2>Mis Empresas</h2>
	</div>

	<div class="form-group" style="display: flex; justify-content: center;">
		<a href="/web/empresa" class="btn btn-success"> Agregar Empresa</a>
	</div>

	<div class="form-group table-responsive">
				<table  class="table table-hover datatable-responsive"  >
					<thead>						          
						<td>#</td>
						<td>Empresa</td>
						<td class="none">RFC</td>
						<td>Fecha Límite de su Próximo Pago</td>
						<td>Plan Contratado</td>
						<td class="none">Precio</td>
						<td>Fecha de Inicio</td>
						<td>Fecha de Termino</td>
						<td>Estado del Servicio</td>
						<td>Estado de la Publicación</td>
						<td>Días Vigentes del Servicio</td>
						<td >Acciones</td>
						
					</thead>
					<tbody>
						@php($index = 1)
						@foreach($empresas as $empresa)
							<tr>
								<td>{{$index++}}</td>
								<td>{{$empresa->empresa}}</td>
								<td class="none">{{$empresa->rfc}}</td>
								<td>{{$empresa->fechalimite}}</td>
								<td>{{$empresa->tipoplan}}</td>
								<td>{{$empresa->precio}}</td>
								<td>{{$empresa->fecha_vig_inicio}}</td>
								<td>{{$empresa->fecha_vig_termino}}</td>
								<td>{{$empresa->estado_servicio}}</td>
								<td>{{$empresa->estado}}</td>
								<td @if($empresa->dias_vig <= 3) style="color:red;" @endif>{{$empresa->dias_vig}}</td>
								<td >
                  					<a href="{{ route('empresa.edit',['id' =>$empresa->idempresa ]) }}" title="Editar información de la empresa"><i class="glyphicon glyphicon-pencil"></i> </a>

								
              						<a class="EmpresaApp" href="{{route('app.index',
              							[
              								'id'=>$empresa->idcliente,
              								'empresa'=>$empresa->idempresa,
              								'plan' => $empresa->idplan,
              								'mun' => $empresa->idmunicipio,
              								'nombre' => $empresa->empresa])}}" title="Cargar información para la app"  ><i class="glyphicon glyphicon-cloud-upload"></i> </a>
								</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
	</div>
<!-- <a href="#" title="Ver comentarios de los usarios" ><i class="glyphicon glyphicon-comment"></i> </a> -->