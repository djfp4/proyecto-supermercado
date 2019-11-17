@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h1>Registro de departametos</h1>

	<form action="/departamentos" method="post">
		Nombre:<input type="text" name="nombre" required=""><br>
		Descripción:<textarea name="descripcion" required=""></textarea><br>
		{{csrf_field()}}
		<input type="submit" value="Guardar">
	</form>

@endsection