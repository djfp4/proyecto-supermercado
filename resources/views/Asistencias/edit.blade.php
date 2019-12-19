@extends("../Layouts.asistencia")
@section('titulo')
Salida
@endsection

@section("contenido")
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
</script>
	
		<form action="/asistencias/1" method="post">
			@method('put')
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Carnet de indentidad</label><input type="text" name="ci_nit" required="" class="form-control col-md-4" onkeypress="return validar(event)">
		</div>
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