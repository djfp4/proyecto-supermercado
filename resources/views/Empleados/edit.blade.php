@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/empleados/{{$empleado->id}}" method="post">
		@method('PUT')
		Nombre: <input type="text" name="nombre" value="{{$empleado->nombre}}" required=""><br>
		Apellido paterno: <input type="text" name="paterno" value="{{$empleado->paterno}}" required=""><br>
		Apellido materno: <input type="text" name="materno" value="{{$empleado->materno}}" required=""><br>
		Fecha de nacimiento: <input type="date" name="fecha_nac" value="{{$empleado->fecha_nac}}" required=""><br>
		Telefono/celular: <input type="text" name="telefono" value="{{$empleado->telefono}}" required=""><br>
		Zona: <input type="text" name="zona" value="{{$empleado->zona}}" required=""><br>
		Avenida/calle: <input type="text" name="avenida" value="{{$empleado->avenida}}" required=""><br>
		Nro: <input type="text" name="nro" value="{{$empleado->nro}}" required=""><br>
		Cargo: <input type="text" name="cargo" value="{{$empleado->cargo}}" required=""><br>
		Departamento: <select name="departamento_id">
			<option value="{{$empleado->departamento_id}}" selected="{{$empleado->departamento_id}}">{{$departamento_nom->nombre}}</option>

			@foreach($departamento as $departamentos)

				<option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>

			@endforeach
		</select><br>
		{{csrf_field()}}
		<input type="submit" name="registrar" value="Registrar"> <input type="reset" name="reset" value="Borrar campos">
	</form>
	

@endsection