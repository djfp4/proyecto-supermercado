@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Empleados</h1></center>
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th><th>Apellido paterno</th>
				<th>Apelllido materno</th>
				<th>Fecha de nacimiento</th>
				<th>Telefono</th>
				<th>Zona</th>
				<th>Avenida</th>
				<th>Numero</th>
				<th>Cargo</th>
				<th>Departamento</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($empleado as $empleados)

			<tr>
				<td>{{$empleados->emple}}</td>
				<td>{{$empleados->paterno}}</td>
				<td>{{$empleados->materno}}</td>
				<td>{{$empleados->fecha_nac}}</td>
				<td>{{$empleados->telefono}}</td>
				<td>{{$empleados->zona}}</td>
				<td>{{$empleados->avenida}}</td>
				<td>{{$empleados->nro}}</td>
				<td>{{$empleados->cargo}}</td>
				<td>{{$empleados->nombre}}</td>
				<td><a href="{{route('empleados.edit',$empleados->id)}}" class="btn btn-info"> </a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection