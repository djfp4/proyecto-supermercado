@extends("../Layouts.plantilla")

@section("titulo")
Editar empleado
@endsection

@section("contenido")

	<form action="/empleados/{{$empleado->id}}" method="post">
		@method('PUT')
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Nombre
			</label>
			<input class="form-control col-md-3" type="text" name="nombre" value="{{$empleado->nombre}}" required="">
		
			<label class="col-md-2 col-form-label text-md-right">
				Apellido paterno
			</label>
			<input class="form-control col-md-3" type="text" name="paterno" value="{{$empleado->paterno}}" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Apellido materno
			</label>
			<input class="form-control col-md-3" type="text" name="materno" value="{{$empleado->materno}}" required="">
		
			<label class="col-md-2 col-form-label text-md-right">
				Fecha de nacimiento
			</label>
			<input class="form-control col-md-3" type="date" name="fecha_nac" value="{{$empleado->fecha_nac}}" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				CI/NIT
			</label>
			<input class="form-control col-md-3" type="number" name="ci_nit" value="{{$empleado->ci_nit}}" required="">
		
			<label class="col-md-2 col-form-label text-md-right">
				Telefono/celular
			</label>
			<input class="form-control col-md-3" type="text" name="telefono" value="{{$empleado->telefono}}" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Zona
			</label>
			<input class="form-control col-md-3" type="text" name="zona" value="{{$empleado->zona}}" required="">
		
			<label class="col-md-2 col-form-label text-md-right">
				Avenida/calle
			</label>
			<input class="form-control col-md-3" type="text" name="avenida" value="{{$empleado->avenida}}" required="">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Nro
			</label>
			<input class="form-control col-md-3" type="text" name="nro" value="{{$empleado->nro}}" required="">
		
			<label class="col-md-2 col-form-label text-md-right">
				Puesto
			</label>
			<select class="form-control col-md-3 selectpicker" data-live-search="true" name="puesto_id">
				<option value="{{$empleado->puesto_id}}" selected="{{$empleado->puesto_id}}">
					{{$puesto_nom->cargo}}
				</option>

				@foreach($puesto as $puestos)
					<option value="{{$puestos->id}}">
						{{$puestos->nombre}}
					</option>
				@endforeach
			</select>
		</div>
		{{csrf_field()}}
		<div class="form-group row">
			<div class="col-md-2 offset-md-4">
				<input class="btn btn-danger btn-block" type="submit" name="registrar" value="Registrar"> 
			</div>
			<div class="col-md-2">
				<input class="btn btn-primary btn-block" type="reset" name="reset" value="Borrar campos">
			</div>
		</div>
		
	</form>
	

@endsection