@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Compras</h1></center>
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Usuario</th>
				<th>Proveedor</th>
				<th>Fecha</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($compra as $compras)

			<tr>
				<td>{{$compras->name}}</td>
				<td>{{$compras->nombre}}</td>
				<td>{{$compras->fecha_hora_actual}}</td>
				<td><a href="{{route('compras.show',$compras->id)}}" class="btn btn-info"><img src="{{asset('images/detalles.png')}}" width="25px" height="25px"></a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection