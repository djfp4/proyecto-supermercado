@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")

	<form action="/salarios/{{$salario->id}}" method="post">
		@method('PUT')
		Salario: <input type="text" name="salario" required="" value="{{$salario->salario}}"><br>
		Descuentos: <input type="text" name="descuentos" required="" value="{{$salario->descuentos}}"><br>
		AFP: <input type="text" name="afp" required="" value="{{$salario->afp}}"><br>
		Empleado: <select name="empleado_id">
			<option selected="{{$empleado_nom->id}}" value="{{$empleado_nom->id}}">
				{{$empleado_nom->nombre}}
			</option>
			@foreach($empleado as $empleados)

				<option value="{{$empleados->id}}">{{$empleados->nombre}}</option>

			@endforeach
		</select><br>
		{{csrf_field()}}
		<input type="submit" name="registrar" value="Registrar"> <input type="reset" name="reset" value="Borrar campos">
	</form>
	

@endsection