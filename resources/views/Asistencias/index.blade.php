@extends("../Layouts.asistencia")

@section('titulo')
Asistencia
@endsection
@section("contenido")
<center>
	<a href="{{route('asistencias.create')}}" class="btn btn-primary col-md-4">Ingreso</a>
	<a href="{{route('asistencias.edit',1)}}" class="btn btn-danger col-md-4">Salida</a>
</center>
@endsection