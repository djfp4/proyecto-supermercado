@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/empleados/{{$empleado->id}}" method="post">
		@method('PUT')
		Nombre: <input type="text" name="nombre" value="{{$empleado->nombre}}"><br>
		Apellido paterno: <input type="text" name="paterno" value="{{$empleado->paterno}}"><br>
		Apellido materno: <input type="text" name="materno" value="{{$empleado->materno}}"><br>
		Fecha de nacimiento: <input type="date" name="fecha_nac" value="{{$empleado->fecha_nac}}"><br>
		Telefono/celular: <input type="text" name="telefono" value="{{$empleado->telefono}}"><br>
		Zona: <input type="text" name="zona" value="{{$empleado->zona}}"><br>
		Avenida/calle: <input type="text" name="avenida" value="{{$empleado->avenida}}"><br>
		Nro: <input type="text" name="nro" value="{{$empleado->nro}}"><br>
		Cargo: <input type="text" name="cargo" value="{{$empleado->cargo}}"><br>
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