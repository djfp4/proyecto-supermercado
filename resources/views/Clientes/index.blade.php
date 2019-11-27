@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Clientes</h1></center>
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido paterno</th>
				<th>Apelllido materno</th>
				<th>CI/NIT</th>

				<th>Editar</th>
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

			</tr>

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection