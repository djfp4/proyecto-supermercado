@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
<div class="container">
	<center><h1>Edicion de proveedor</h1></center>
	<hr>

	<form action="/proveedores/{{$proveedor->id}}" method="post">
		@method('PUT')
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" value="{{$proveedor->nombre}}" name="nombre" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Telefono</label> <input type="text" value="{{$proveedor->telefono}}" name="telefono" class="form-control col-md-4 " required=""></div>
		
		
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