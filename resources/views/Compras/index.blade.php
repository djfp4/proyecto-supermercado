@extends("../Layouts.plantilla")
@section('titulo')
Compras
@endsection
@section("contenido")
	<a href="{{route('compras.nuevo')}}" class=" btn btn-info">Nueva compra</a>
    <a href="{{route('proveedores.create')}}" class=" btn btn-info">Nuevo proveedor</a>
    <a href="{{route('proveedores.index')}}" class=" btn btn-info">Listado de proveedores</a>
<hr>
	<form action="compras" method="get">
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Fecha inicial
			</label>
			<input type="date" name="fecha1" class="form-control col-md-2">
			<label class="col-md-2 col-form-label text-md-right">
				Fecha final
			</label>
			<input type="date" name="fecha2" class="form-control col-md-2">
			<input type="submit" class="btn  btn-success col-md-1 offset-md-1" value="Filtrar">
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label text-md-right">
				Proveedor
			</label>
			<select class="form-control col-md-2 selectpicker" data-live-search="true" name="proveedor">
				<option value="0">Elija un proveedor</option>
				@foreach($proveedor as $proveedores)
					<option value="{{$proveedores->id}}">{{$proveedores->nombre}}</option>
				@endforeach
			</select>
			<label class="col-md-2 col-form-label text-md-right">
				Ordenar por
			</label>
			<select class="form-control col-md-2" name="orden">
				<option value="asc">El más antiguo</option>
				<option value="desc">El más nuevo</option>
			</select>
			
			<a href="{{route('compras.pdf')}}" target="_blank" class="btn btn-info offset-md-1 col-md-1">PDF</a>
		</div>
	</form>
	<br>
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Usuario</th>
				<th>Proveedor</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($compra as $compras)

			<tr>
				<td>{{$compras->name}}</td>
				<td>{{$compras->nombre}}</td>
				<td>{{$compras->fecha_actual}}</td>
				<td>{{$compras->hora_actual}}</td>
				<td><a href="{{route('compras.show',$compras->id)}}" class="btn btn-sm btn-info col-md-4"><img src="{{asset('images/mas.png')}}" width="25px" height="25px"></a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
	{{$compra->render()}}
</div>

 
@endsection