@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/salarios" method="post">
		Salario: <input type="text" name="salario" required=""><br>
		Descuentos: <input type="text" name="descuentos" required="" value="0"><br>
		AFP: <input type="text" name="afp" required="" value="0"><br>
		Empleado: <select name="empleado_id"><br>
			@foreach($empleado as $empleados)

				<option value="{{$empleados->id}}">{{$empleados->nombre}}</option>

			@endforeach
		</select><br>
		{{csrf_field()}}
		<input type="submit" name="registrar" value="Registrar"> <input type="reset" name="reset" value="Borrar campos">
	</form>
	

@endsection