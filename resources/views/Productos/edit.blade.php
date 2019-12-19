@extends("../Layouts.plantilla")

@section("titulo")
Editar producto
@endsection

@section("contenido")

		<form action="/productos/{{$producto->id}}" method="post">
			@method('PUT')
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Nombre</label><input type="text" name="nombre" value="{{$producto->nombre}}" required="" class="form-control col-md-4" autofocus="">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Cantidad por lote</label><input type="text" name="cant_x_lote" value="{{$producto->cant_x_lote}}" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Precio de compra</label><input type="text" name="precio_compra" value="{{$producto->precio_compra}}" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Precio de venta</label><input type="text" name="precio_venta" value="{{$producto->precio_venta}}" required="" class="form-control col-md-4">
			</div>
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Categoria</label><select name="categoria_id" class="form-control col-md-4">
					<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
				@foreach($categorias as $categorias1)
					<option value="{{$categorias1->id}}">{{$categorias1->nombre}}</option>
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


@endsection