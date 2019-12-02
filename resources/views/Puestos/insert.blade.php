@extends("../Layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<div class="container">
		<center><h1>Registro de puesto</h1></center>
		<hr>
		<form action="/puestos" method="post">
			<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">Cargo</label> <input type="text" name="cargo" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Hora de entrada</label> <input type="time" name="cargo" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Hora de salida</label> <input type="time" name="cargo" class="form-control col-md-4" required=""></div>
		<div class="form-group row">
		<label class="col-md-4 col-form-label text-md-right">Departamento</label> <select name="departamento_id" class="form-control col-md-4 selectpicker" data-live-search="true">
			@foreach($departamento as $departamentos)

				<option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>

			@endforeach
		</select></div>
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