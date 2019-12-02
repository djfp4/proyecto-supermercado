@extends("../Layouts.plantilla")



@section("contenido")
    <center><h1>Categorias</h1></center>
		<div class="container">
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
		</div>

 
@endsection