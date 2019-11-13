@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<table border="1">
		<tr>
			<td>Nombre</td><td>Apellido paterno</td>
			<td>Apelllido materno</td>
			<td>Fecha de nacimiento</td>
			<td>Telefono</td>
			<td>Zona</td>
			<td>Avenida</td>
			<td>Numero</td>
			<td>Cargo</td>
		</tr>
		
		@foreach($empleado as $empleados)

			<tr>
				<td><a href="{{route('empleados.edit',$empleados->id)}}"> {{$empleados->nombre}}</a></td>
				<td>{{$empleados->paterno}}</td>
				<td>{{$empleados->materno}}</td>
				<td>{{$empleados->fecha_nac}}</td>
				<td>{{$empleados->telefono}}</td>
				<td>{{$empleados->zona}}</td>
				<td>{{$empleados->avenida}}</td>
				<td>{{$empleados->nro}}</td>
				<td>{{$empleados->cargo}}</td>

			</tr>

		@endforeach
	</table>

@endsection