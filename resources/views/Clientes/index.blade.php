@extends("../Layouts.admin")
@section('titulo')
Clientes
@endsection
@section("contenido")
    
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido paterno</th>
				<th>Apelllido materno</th>
				<th>CI/NIT</th>

				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($cliente as $clientes)

			<tr>
				<td>{{$clientes->nombre}}</td>
				<td>{{$clientes->paterno}}</td>
				<td>{{$clientes->materno}}</td>
				<td>{{$clientes->ci_nit}}</td>

				<td><a href="{{route('clientes.edit',$clientes->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"> </a></td>
				
				<td><a href="" data-target="#modal-delete-{{$clientes->id}}" data-toggle="modal"><button class="btn btn-danger"><img src="{{asset('images/eliminar.png')}}" width="25px" height="25px"> </button></a></td>
			</tr>@include('clientes.modal')

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection