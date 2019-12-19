@extends("../Layouts.plantilla")
@section("titulo")
Proveedores
@endsection
@section("contenido")
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Telefono</th>

				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($proveedor as $proveedors)

			<tr>
				<td>{{$proveedors->nombre}}</td>
				<td>{{$proveedors->telefono}}</td>

				<td><a href="{{route('proveedores.edit',$proveedors->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"> </a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
	<a href="{{route('compras.index')}}" class="btn btn-success offset-md-9 col-md-2">Volver</a>


@endsection