@extends("../Layouts.plantilla")
@section("titulo")
Categorias
@endsection
@section("contenido")

<a href="{{route('categorias.create')}}" class="btn btn-info">Nueva categoria</a>
<hr>
 
			<table class="table table-striped">

				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>

						<th>Editar</th>
					</tr>
				</thead>
				<tbody>
				@foreach($categoria as $categorias)

					<tr>
						<td>{{$categorias->nombre}}</td>
						<td>{{$categorias->descripcion}}</td>

						<td><a href="{{route('categorias.edit',$categorias->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px" height="25px"> </a></td>

					</tr>

				@endforeach
				</tbody>
			</table>

@endsection