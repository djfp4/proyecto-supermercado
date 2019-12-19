@extends("../Layouts.plantilla")

@section("titulo")
Agregar producto
@endsection

@section("contenido")
		<form action="/productos" method="post">
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Nombre
				</label>
				<input type="text" name="nombre" required="" class="form-control col-md-4" autofocus="" id="nombre">
				<label id="mensaje" class="offset-md-4" style="color: red;">
					Solo puede ingresar un maximo de 75 caracteres
				</label>
			</div>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Cantidad por lote
				</label>
				<input type="number" name="cant_x_lote" required="" id="cant_x_lote" class="form-control col-md-4">
			</div>	
				<label id="mensaje_1" class="offset-md-4" style="color: red;">
					Solo puede ingresar un maximo de 5 digitos
				</label>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Precio de compra
				</label>
				<input type="number" step="0.1" name="precio_compra" required="" id="precio_compra" class="form-control col-md-4">
			</div>
				<label id="mensaje_2" class="offset-md-4" style="color: red;">
					Solo puede ingresar un maximo de 10 digitos
				</label>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Precio de venta
				</label>
				<input type="number" step="0.1" name="precio_venta" required="" id="precio_venta" class="form-control col-md-4">
			</div>
				<label id="mensaje_3" class="offset-md-4" style="color: red;">
					Solo puede ingresar un maximo de 10 digitos
				</label>
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Categoria
				</label>
				<select name="categoria_id" class="form-control col-md-4 selectpicker" data-live-search="true">
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
					<input type="reset" id="borrar" value="Borrar campos" class="btn btn-danger col-md-3">
				</div>
			</div>
		</form>
	</div>
	@push('scripts')
		<script type="text/javascript">
			$(document).ready(function(){
				$("#mensaje").hide();
				$("#mensaje_1").hide();
				$("#mensaje_2").hide();
				$("#mensaje_3").hide();
				
				$("#borrar").click(function(){
					$("#mensaje").hide();
					$("#mensaje_1").hide();
					$("#mensaje_2").hide();
					$("#mensaje_3").hide();
				});

				$("#nombre").keypress(function(){
					if ($(this).val().length >= 75) {
						$("#mensaje").show(); 
						return false;
					}
					else {
						$("#mensaje").hide();
					}
				});

				$("#nombre").keyup(function(){
					if ($(this).val().length < 75) {
						$("#mensaje").hide();
					}
				});

				$("#cant_x_lote").keypress(function(){
					if ($(this).val().length >= 5) {
						$("#mensaje_1").show(); 
						return false;
					}
					else {
						$("#mensaje_1").hide();
					}
				});

				$("#cant_x_lote").keyup(function(){
					if ($(this).val().length < 5) {
						$("#mensaje_1").hide();
					}
				});

				$("#precio_compra").keypress(function(){
					if ($(this).val().length >= 10) {
						$("#mensaje_2").show(); 
						return false;
					}
					else {
						$("#mensaje_2").hide();
					}
				});

				$("#precio_compra").keyup(function(){
					if ($(this).val().length < 10) {
						$("#mensaje_2").hide();
					}
				});

				$("#precio_venta").keypress(function(){
					if ($(this).val().length >= 10) {
						$("#mensaje_3").show(); 
						return false;
					}
					else {
						$("#mensaje_3").hide();
					}
				});

				$("#precio_venta").keyup(function(){
					if ($(this).val().length < 10) {
						$("#mensaje_3").hide();
					}
				});
			});
		</script>
	@endpush

@endsection