@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")
	
		<form action="/departamentos/{{$departamento->id}}" method="post">
			@method('PUT')
		Nombre:<input type="text" name="nombre" value="{{$departamento->nombre}}" required=""><br>
		Descripción:<br><textarea name="descripcion" rows="5" cols="50" required="">{{$departamento->descripcion}}</textarea><br>
		{{csrf_field()}}
		<input type="submit" value="Guardar">
		</form>
		
@endsection