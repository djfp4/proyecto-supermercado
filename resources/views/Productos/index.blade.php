@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Productos</h1></center>
<div class="container">
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Lotes</th>
				<th>Cantidad por lote</th>
				<th>Precio de compra</th>
				<th>Precio de venta</th>
				<th>Categoria</th>

				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($producto as $productos)

			<tr>
				<td>{{$productos->prod}}</td>
				<td>{{$productos->lotes}}</td>
				<td>{{$productos->cant_x_lote}}</td>
				<td>{{$productos->precio_compra}}</td>
				<td>{{$productos->precio_venta}}</td>

				<td>{{$productos->nombre}}</td>
				<td><a href="{{route('productos.edit',$productos->id)}}" class="btn btn-info">
					<img src="{{asset('images/editar.png')}}" width="25px" height="25px">
				</a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
</div>

 
@endsection