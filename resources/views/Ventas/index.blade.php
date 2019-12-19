@extends("../Layouts.plantilla")
@section('titulo')
Ventas
@endsection
@section("contenido")
	<a href="{{route('ventas.create')}}" class="btn btn-sm btn-primary" style="color: #fff;">
            Nueva venta
    </a><hr>
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Usuario</th>
				<th>Cliente</th>
				<th>Fecha</th>
				<th>Mas detalles</th>
			</tr>
		</thead>
		<tbody>
		@foreach($venta as $ventas)

			<tr>
				<td>{{$ventas->name}}</td>
				<td>{{$ventas->nombre}} {{$ventas->paterno}}</td>
				<td>{{$ventas->fecha_actual}}</td>
				<td align="center"><a href="ventas/{{$ventas->id}}"><img src="{{asset('images/mas.png')}}" width="25px" height="25px"></a></td>
			</tr>

		@endforeach
		</tbody>
	</table>
	


 
@endsection