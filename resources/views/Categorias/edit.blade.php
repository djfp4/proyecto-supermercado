@extends("../Layouts.plantilla")

@section("titulo")
Editar categoria
@endsection

@section("contenido")

		<form action="/categorias/{{$categoria->id}}" method="post">
			@method('put')
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" required="" class="form-control col-md-4" autofocus="" value="{{$categoria->nombre}}">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Descripción</label><input type="text" name="descripcion" required="" class="form-control col-md-4" value="{{$categoria->descripcion}}">
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

		<a href="{{route('categorias.index')}}" class="btn btn-success offset-md-9 col-md-3">Volver</a>

@endsection