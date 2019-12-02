@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Detalle de compra</h1></center>
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Producto</th>
				<th>Lotes</th>
				<th>Cantidad por lote</th>
				<th>Precio de compra</th>
				<th>Precio de venta</th>
				<th>Subtotal</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>

		@foreach($detalleCompra as $detalleCompras)

			<tr>
				<td>{{$detalleCompras->nombre}}</td>
				<td>{{$detalleCompras->lotes}}</td>
				<td>{{$detalleCompras->cant_x_lote}}</td>
				<td>{{$detalleCompras->precio_compra}}</td>
				<td>{{$detalleCompras->precio_venta}}</td>
				
				<td><a href="{{route('compras.show',$detalleCompras->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"></a></td>

			</tr>

		@endforeach
		
		</tbody>
	</table>
</div>

 
@endsection