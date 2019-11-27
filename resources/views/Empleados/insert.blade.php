@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
<div class="container">
	<center><h1>Registro de empleados</h1></center>
	<hr>

	<form action="/empleados" method="post">
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido paterno</label> <input type="text" name="paterno" class="form-control col-md-4 " required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido materno</label> <input type="text" name="materno" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label> <input type="date" name="fecha_nac" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Telefono/celular</label> <input type="text" name="telefono" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Zona</label> <input type="text" name="zona" class="form-control col-md-4"></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Avenida/calle</label> <input type="text" name="avenida" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Nro</label> <input type="text" name="nro" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Cargo</label> <input type="text" name="cargo" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Departamento</label> <select name="departamento_id" class="form-control col-md-4 selectpicker" data-live-search="true">
			@foreach($departamento as $departamentos)

				<option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>

			@endforeach
		</select></div>
		{{csrf_field()}}
		<hr>
		<div class="form-group row">
			<div class="col-md-8 offset-md-4 ">
				<input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
			
		 		<input type="reset" name="reset" value="Borrar campos" class="btn btn-danger">
		 	</div>
		</div>
	</form>
	</div>

@endsection