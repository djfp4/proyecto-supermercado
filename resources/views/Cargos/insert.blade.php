@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<div class="container">
		<center><h1>Registro de roles</h1></center>
		<hr>
		<form action="/cargos" method="post">
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="descripcion" required="" class="form-control col-md-4">
		</div>
		<hr>
			{{csrf_field()}}
			<div class="form-group row">
				<div class="col-md-8 offset-md-4 ">
					<input type="submit" value="Guardar" class="btn btn-primary col-md-3">
					<input type="reset" value="Borrar campos" class="btn btn-danger col-md-3">
				</div>
			</div>
		</form>
	</div>

@endsection