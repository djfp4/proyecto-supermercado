@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<table>
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

@endsection