@extends("../Layouts.asistencia")

@section("titulo")
Entrada
@endsection

@section("contenido")

		<hr>
		<form action="/asistencias" method="post">
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">
					Carnet de indentidad
				</label>
				<input type="text" name="ci_nit" required="" id="ci_nit" class="form-control col-md-4" onkeypress="return validar(event)">

		</div>
		<label id="mensaje" class="offset-md-4" style="color: red;">Solo puede ingresar 12 digitos</label>
		<hr>
			{{csrf_field()}}
			<div class="form-group row">
				<div class="col-md-8 offset-md-4 ">
					<input type="submit" value="Guardar" class="btn btn-primary col-md-3">
					<a href="{{route('asistencias.index')}}" class="btn btn-danger col-md-3">Cancelar</a>
				</div>
			</div>
		</form>
	

@endsection
@push('scripts')
<script type="text/javascript">
	function validar(e)
	  {
	    tecla=(document.all) ? e.keyCode : e.which;

	    if (tecla==8) 
	    {
	      return true;
	    }

	    patron=/[0-9]/;
	    tecla_final=String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	  }

	 $(document).ready(function(){
			 	setTimeout(function() {
		        $("#ci").fadeOut(1500);
    			},3000);
				$("#mensaje").hide();
				
				$("#borrar").click(function(){
					$("#mensaje").hide();
					$("#mensaje_1").hide();
					$("#mensaje_2").hide();
					$("#mensaje_3").hide();
				});

				$("#ci_nit").keypress(function(){
					if ($(this).val().length >= 12) {
						$("#mensaje").show();
						setTimeout(function() {
				        $("#mensaje").fadeOut(1500);
				    	},3000); 
						return false;
					}
					else {
						$("#mensaje").hide();
					}
				});

				$("#ci_nit").keyup(function(){
					if ($(this).val().length < 12) {
						$("#mensaje").hide();
					}
				});
			});
</script>
@endpush