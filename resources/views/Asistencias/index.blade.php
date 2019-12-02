@extends("../Layouts.plantilla")


@section("contenido")
	<h1>Asistencias</h1>
	<a href="{{route('asistencias.create')}}" class="btn btn-primary">Ingreso</a>
	<a href="{{route('asistencias.edit',1)}}" class="btn btn-danger">Salida</a>
@endsection