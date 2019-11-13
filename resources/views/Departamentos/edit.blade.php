@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<table>
		<tr>
			<td>Nombre</td><td>Descripción</td>
		</tr>
		
		<form action="/departamentos/{{$departamento->id}}" method="post">
			<!--<input type="hidden" name="_method" value="PUT">-->
			@method('PUT')
		Nombre:<input type="text" name="nombre" value="{{$departamento->nombre}}"><br>
		Descripción:<br><textarea name="descripcion" rows="5" cols="50">{{$departamento->descripcion}}</textarea><br>
		{{csrf_field()}}
		<input type="submit" value="Guardar">
		</form>
		
	</table>

@endsection