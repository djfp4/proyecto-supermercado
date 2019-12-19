@extends('../Layouts/estilos_pdf')
@section('contenido')
<center>
	<h1>Reporte</h1>
	<table>

			<thead>
				<tr>
					<th>Usuario</th>
					<th>Proveedor</th>
					<th>Fecha</th>
					<th>Hora</th>
				</tr>
			</thead>
			<tbody>
			@foreach($compra as $compras)

				<tr>
					<td>{{$compras->name}}</td>
					<td>{{$compras->nombre}}</td>
					<td>{{$compras->fecha_actual}}</td>
					<td>{{$compras->hora_actual}}</td>
				</tr>

			@endforeach
			</tbody>
	</table>
<center>
@endsection