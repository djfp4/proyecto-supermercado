@extends("../Layouts.estilos_pdf")

@section("contenido")
<center>
	<h1>Reporte</h1>
	<table>

		<thead>
			<tr>
				<th>Producto</th>
				<th>Categoria</th>
				<th>Lotes</th>
				<th>Cant. por lote</th>
				<th>Cant. total</th>
				<th>Precio de compra</th>
				<th>Precio de venta</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
		@foreach($detalleCompra as $detalleCompras)

			<tr>
				<td>{{$detalleCompras->nombre}}</td>
				<td>{{$detalleCompras->categoria}}</td>
				<td>{{$detalleCompras->lotes}}</td>
				<td>{{$detalleCompras->cant_x_lote}}</td>
				<td>{{$detalleCompras->lotes*$detalleCompras->cant_x_lote}}</td>
				<td>{{$detalleCompras->precio_compra}} Bs.</td>
				<td>{{$detalleCompras->precio_venta}} Bs.</td>
				
				<td>{{$detalleCompras->lotes * $detalleCompras->precio_compra * $detalleCompras->cant_x_lote}} Bs.</td>

			</tr>

		@endforeach

			<tr>
				
				<td colspan="7"><h4>Total</h4></td>
				<td colspan="3"><h4>{{$subtotal->subtotal}} Bs.</h4></td>
				
			</tr>
		
		</tbody>
	</table>

</center>

 
@endsection