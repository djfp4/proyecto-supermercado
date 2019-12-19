@extends("../Layouts.admin")

@section("titulo")
Departamentos
@endsection

@section("contenido")

	
	<a href="{{route('departamentos.create')}}" class="btn btn-info">Registrar Departamento</a>
	<hr>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Nombre</th><th>Descripción</th><th>Editar</th><th>Eliminar</th>
		</tr>
		</thead>
		<tbody>
		@foreach($departamento as $departamentos)

			<tr>
				<td>{{$departamentos->nombre}}</td>
				<td>{{$departamentos->descripcion}}</td>
				<td><a href="{{route('departamentos.edit',$departamentos->id)}}" class="btn btn-primary"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"></a></td>
				<td><a href="" data-target="#modal-delete-{{$departamentos->id}}" data-toggle="modal"><button class="btn btn-danger"><img src="{{asset('images/eliminar.png')}}" width="25px" height="25px"> </button></a></td>
			</tr>
			@include('departamentos.modal')

		@endforeach
	</tbody>
	</table>


@endsection