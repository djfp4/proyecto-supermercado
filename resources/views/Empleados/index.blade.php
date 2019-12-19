@extends("../Layouts.plantilla")
@section('titulo')
Empleados
@endsection
@section("contenido")
	<table>
		<tr>
			<td><a href="{{route('empleados.create')}}" class="btn btn-info">Registrar nuevo empleado</a></td>
			<td><a href="{{route('salarios.create')}}" class="btn btn-info">Asisgnar salario</a></td>
			<td><a href="{{route('asistencias.index')}}" class="btn btn-info">Registrar asistencia</a></td>
			<td><a href="{{route('departamentos.index')}}" class="btn btn-info">Listado de departamentos</a></td>
		</tr>
	</table>
	<hr>
		<h5>Listado de empleados</h5>
	<hr>
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>CI/NIT</th>
				<th>Telefono</th>
				<th>Zona</th>
				<th>Avenida</th>
				<th>Numero</th>
				<th>Cargo</th>
				<th>Salario</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($empleado as $empleados)

			<tr>
				<td>{{$empleados->emple}} {{$empleados->paterno}} {{$empleados->materno}}</td>
				<td>{{$empleados->ci_nit}}</td>
				<td>{{$empleados->telefono}}</td>
				<td>{{$empleados->zona}}</td>
				<td>{{$empleados->avenida}}</td>
				<td>{{$empleados->nro}}</td>
				<td>{{$empleados->cargo}}</td>
				<td>{{$empleados->salario}} Bs.</td>
				<td align="center"><a href="{{route('empleados.edit',$empleados->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px"> </a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection