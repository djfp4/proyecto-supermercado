@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")


	<div class="container">
		<h1>Departamentos</h1>
	<table class="table table-striped">
		<tr>
			<td>Nombre</td><td>Descripción</td>
		</tr>
		
		@foreach($departamento as $departamentos)

			<tr>
				<td><a href="{{route('departamentos.edit',$departamentos->id)}}"> {{$departamentos->nombre}}</a></td>
				<td>{{$departamentos->descripcion}}</td>
			</tr>

		@endforeach
	</table>
	</div>

@endsection