@extends("../Layouts.plantilla")

@section("titulo")
Detalle de compra
@endsection
@section("contenido")
	<table class="table table-striped">

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
				<th colspan="2">Opciones</th>
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

				<td><a href="{{route('compras.edit', $detalleCompras->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"></a></td>
				<td><a href="" data-target="#modal-delete-{{$detalleCompras->id}}" data-toggle="modal"><button class="btn btn-danger"><img src="{{asset('images/eliminar.png')}}" width="25px" height="25px"></button></a></td>

			</tr>@include('compras.modal')

		@endforeach

			<tr>
				
				<td colspan="7"><h4>Total</h4></td>
				<td colspan="3"><h4>{{$subtotal->subtotal}} Bs.</h4></td>
				
			</tr>
		
		</tbody>
	</table>
	<div class="col-md-7 offset-md-7">
		<a href="{{route('compras.pdfDetalle')}}" target="_blank" class="btn btn-info col-md-3">PDF</a>
		<a href="/compras" class="btn btn-success col-md-3">Volver</a>
	</div>
</div>

 
@endsection