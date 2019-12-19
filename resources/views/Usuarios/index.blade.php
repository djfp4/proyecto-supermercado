@extends("../Layouts.plantilla")
@section('titulo')
Usuarios
@endsection
@section("contenido")
<a href="{{route('register')}}" class="btn btn-info">Nuevo usuario</a>
<hr>
<table class="table table-striped">

		<thead>
			<tr>
				<th>Nombre de usuario</th>
				<th>Empleado</th>
				<th>Rol</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
		@foreach($usuario as $usuarios)

			<tr>
				<td>{{$usuarios->name}}</td>
				<td>{{$usuarios->nombre}}</td>
				<td>{{$usuarios->descripcion}}</td>
				<td align="center"><a href="{{route('usuarios.edit',$usuarios->id)}}" class="btn btn-info"><img src="{{asset('images/editar.png')}}" width="25px"> </a></td>

			</tr>

		@endforeach
		</tbody>
	</table>
	{{$usuario->render()}}
@endsection