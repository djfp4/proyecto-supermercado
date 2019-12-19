@extends("../Layouts.plantilla")
@section("titulo")
Productos
@endsection
@section("contenido")
<a href="{{route('productos.create')}}" class=" btn btn-info">Nuevo producto</a>
<a href="{{route('categorias.index')}}" class=" btn btn-info">Listado de categorias</a>
<hr>
	<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Total</th>
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
				<td>{{$productos->total}}</td>
				<td>{{$productos->cant_x_lote}}</td>
				<td>{{$productos->precio_compra}} Bs.</td>
				<td>{{$productos->precio_venta}} Bs.</td>

				<td>{{$productos->nombre}}</td>
				<td><a href="{{route('productos.edit',$productos->id)}}" class="btn btn-info">
					<img src="{{asset('images/editar.png')}}" width="25px" height="25px">
				</a></td>

			</tr>

		@endforeach
		</tbody>
	</table>


 
@endsection