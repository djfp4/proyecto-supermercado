@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
<div class="container">
	<center><h1>Edicion de cliente</h1></center>
	<hr>

	<form action="/clientes/{{$cliente->id}}" method="post">
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" value="{{$cliente->nombre}}" name="nombre" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido paterno</label> <input type="text" value="{{$cliente->paterno}}" name="paterno" class="form-control col-md-4 " required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Apellido materno</label> <input type="text" value="{{$cliente->materno}}" name="materno" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">CI o NIT</label> <input type="text" value="{{$cliente->ci_nit}}" name="ci_nit" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Usuario</label> <input type="text" name="usuario_id" class="form-control col-md-4" required="" value="{{auth()->id()
}}"></div>
		
		
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