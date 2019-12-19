@extends("../Layouts.admin")

@section("cabecera")
<h1>Esta es la cabecera</h1>
@endsection

@section("contenido")
	
	
		<form action="/departamentos/{{$departamento->id}}" method="post">
			@method('PUT')
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Nombre</label>
				<input type="text" class="form-control col-md-4" name="nombre" value="{{$departamento->nombre}}" required="">
			</div>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Descripción</label>
				<input type="text" value="{{$departamento->descripcion}}" class="form-control col-md-6" name="descripcion" required="">
			</div>
		{{csrf_field()}}
			<div class="form-group row">
				<div class="col-md-4 offset-md-4 ">
					<input type="submit" class="btn btn-primary btn-block" value="Guardar">
				</div>
			</div>
		</form>
	
@endsection