@extends("../Layouts.admin")

@section("titulo")
Departamento
@endsection

@section("contenido")


	<div class="container">
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Nombre</th><th>Descripción</th><th>Editar</th><th>Eliminar</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$departamento->nombre}}</td>
				<td>{{$departamento->descripcion}}</td>
				<td><a href="{{route('departamentos.edit',$departamento->id)}}" class="btn btn-primary"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"></a></td>
				<td><a href="" data-target="#modal-delete-{{$departamento->id}}" data-toggle="modal"><button class="btn btn-danger"><img src="{{asset('images/eliminar.png')}}" width="25px" height="25px"> </button></a></td>
			</tr>
	</tbody>
	</table>
	</div>

@endsection