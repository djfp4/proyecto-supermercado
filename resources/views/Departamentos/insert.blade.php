@extends("../Layouts.admin")

@section("titulo")
Registro de departamentos
@endsection

@section("contenido")
	

	<form action="/departamentos" method="post">
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Nombre</label>
				<input type="text" class="form-control col-md-4" name="nombre" required="">
			</div>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Descripción</label>
				<input type="text" class="form-control col-md-4" name="descripcion" required="">
					
			</div>
		{{csrf_field()}}
			<div class="form-group row">
				<div class="col-md-8 offset-md-3 ">
					<input type="submit" class="btn btn-primary col-md-4" value="Guardar">
					<input type="reset" class="btn btn-danger col-md-4" value="Borrar">
				</div>
			</div>
			<a href="{{route('departamentos.index')}}" class="btn btn-success offset-md-9 col-md-3">Volver</a>
		</form>

@endsection