@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h1>Registro de departametos</h1>

	<form action="/departamentos" method="post">
		<div class="col-md-6">
		Nombre:<input type="text" name="nombre" required="" class="form-control"><br>
	</div>
	<div class="col-md-6">
		Descripción:<textarea name="descripcion" required="" class="form-control"></textarea><br>
	</div>
		{{csrf_field()}}
		<input type="submit" value="Guardar" class="btn btn-primary">
	</form>

@endsection