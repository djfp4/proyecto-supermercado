@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/departamentos" method="post">
		Nombre:<input type="text" name="nombre"><br>
		Descripción:<textarea name="desc"></textarea><br>
		{{csrf_field()}}
		<input type="submit" value="Guardar">
	</form>

@endsection