@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Proveedores</h1></center>
<div class="container">
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
</div>

 
@endsection