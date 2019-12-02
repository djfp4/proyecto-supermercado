@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Factura</h1></center>
<div class="container">
	<table class="table table-striped col-md-6">
		<thead>
			<tr>
				<th>Nro. Factura</th>
				<th>Cliente</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$venta->id}}</td>
				<td>{{$venta->nombre}} {{$venta->paterno}}</td>
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
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>

		@foreach($detalleVenta as $detalleVentas)

			<tr>
				<!--<td class="nombre">{{$detalleVentas->nombre}}</td>-->
				<td id="cant">{{$detalleVentas->cantidad}}</td>
				<td id="precio">{{$detalleVentas->precio_venta}}</td>
				<td class="total"></td>
				<!--<td class=".elim"><a href="#" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"></a></td>-->

			</tr>

		@endforeach
		
		</tbody>
	</table>
</div>

@push('scripts')
<script type="text/javascript">
	var suma = 0;

		[].forEach.call(document.querySelectorAll("#factura tr"), function(tr){
    	
    	[].forEach.call(tr.querySelectorAll("td:not(.total)"), function(td){
        suma += parseInt(td.innerHTML);
    	});
    	tr.querySelector(".total").innerHTML = "5";

	});

</script>

@endpush

 
@endsection