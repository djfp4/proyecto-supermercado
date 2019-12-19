@extends("../Layouts.admin")

@section("titulo")
Registro de empleados
@endsection

@section("contenido")

	<form action="/empleados" method="post">
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" class="form-control col-md-3" required="">
			<label class="col-md-2 col-form-label text-md-right">Apellido paterno</label> <input type="text" name="paterno" class="form-control col-md-3 " required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">Apellido materno</label> <input type="text" name="materno" class="form-control col-md-3" required="">
			<label class="col-md-2 col-form-label text-md-right">Ci/NIT</label> <input type="number" name="ci_nit" class="form-control col-md-3" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">Fecha de nacimiento</label> <input type="date" name="fecha_nac" class="form-control col-md-3" required="">
			<label class="col-md-2 col-form-label text-md-right">Telefono/celular</label> <input type="text" name="telefono" class="form-control col-md-3" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">Zona</label> <input type="text" name="zona" class="form-control col-md-3">
			<label class="col-md-2 col-form-label text-md-right">Avenida/calle</label> <input type="text" name="avenida" class="form-control col-md-3" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">Nro</label> <input type="text" name="nro" class="form-control col-md-2" required="">
			<label class="col-md-2 col-form-label text-md-right offset-md-1">Cargo</label> <select name="departamento_id" class="form-control col-md-3 selectpicker" data-live-search="true">
				@foreach($puesto as $puestos)

					<option value="{{$puestos->id}}">{{$puestos->nombre}}</option>

				@endforeach
			</select>
		</div>
		{{csrf_field()}}
		<hr>
		<div class="form-group row">
			<div class="col-md-10 offset-md-2 ">
			
					<input type="submit" name="registrar" value="Registrar" class="btn btn-primary col-md-4 ">
		 			<input type="reset" name="reset" value="Borrar campos" class="btn btn-danger col-md-4">
		 	
		 	</div>
		</div>
	</form>

@endsection