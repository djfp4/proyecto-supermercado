@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/empleados" method="post">
		Nombre: <input type="text" name="nombre"><br>
		Apellido paterno: <input type="text" name="paterno"><br>
		Apellido materno: <input type="text" name="materno"><br>
		Fecha de nacimiento: <input type="date" name="fecha_nac"><br>
		Telefono/celular: <input type="text" name="telefono"><br>
		Zona: <input type="text" name="zona"><br>
		Avenida/calle: <input type="text" name="avenida"><br>
		Nro: <input type="text" name="nro"><br>
		Cargo: <input type="text" name="cargo"><br>
		Departamento: <select name="departamento_id"><br>
			@foreach($departamento as $departamentos)

				<option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>

			@endforeach
		</select><br>
		{{csrf_field()}}
		<input type="submit" name="registrar" value="Registrar"> <input type="reset" name="reset" value="Borrar campos">
	</form>
	

@endsection