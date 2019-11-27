@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<div class="container">
		<center><h1>Agregar producto</h1></center>
		<hr>
		<form action="/productos" method="post">
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" required="" class="form-control col-md-4" autofocus="">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Lotes</label><input type="text" name="lotes" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Cantidad por lote</label><input type="text" name="cant_x_lote" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Precio de compra</label><input type="text" name="precio_compra" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Precio de venta</label><input type="text" name="precio_venta" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Categoria</label><select name="categoria_id" class="form-control col-md-4">

				@foreach($categoria as $categorias)
					<option value="{{$categorias->id}}">{{$categorias->nombre}}</option>
				@endforeach

			</select>
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