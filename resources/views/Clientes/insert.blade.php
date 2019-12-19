@extends("../Layouts.admin")

@section("titulo")
Registro de clientes
@endsection

@section("contenido")
<div class="container">
	<hr>

	<form action="/clientes" method="post">
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido paterno</label> <input type="text" name="paterno" class="form-control col-md-4 " required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido materno</label> <input type="text" name="materno" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">CI o NIT</label> <input type="text" name="ci_nit" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Usuario</label> <input type="text" name="usuario_id" class="form-control col-md-4" required="" value="{{auth()->id()}}"></div>
		
		
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
	<hr>

@endsection