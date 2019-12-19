@extends("../Layouts.plantilla")

@section('titulo')
Factura
@endsection

@section("contenido")
<div class="container">
	<table class="table table-striped col-md-6">
		<thead>
			<tr>
				<th>Nro. Factura</th>
				<th>Cliente</th>
				<th>Empresa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$venta->id}}</td>
				<td>{{$venta->nombre}} {{$venta->paterno}}</td>
				<td>Mercaplus</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-striped" id="factura">

		<thead>
			<tr>	
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>

		@foreach($detalleVenta as $detalleVentas)

			<tr>
				<td>{{$detalleVentas->nombre}}</td>
				<td>{{$detalleVentas->cantidad}}</td>
				<td>{{$detalleVentas->precio_venta}} Bs.</td>
				<td>{{$detalleVentas->precio_venta*$detalleVentas->cantidad}} Bs.</td>

			</tr>

		@endforeach
		
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"><h4>Total</h4></td>
				<td><h4>{{$total->total}} Bs.</h4></td>
			</tr>
		</tfoot>
	</table>
	<div class="col-md-4 offset-md-8">
		<a href="../descargar-factura/{{ $venta->id }}"  target="_blank" class="btn btn-sm btn-primary btn-block">
            Factura
        </a>
    </div>
</div>


 
@endsection