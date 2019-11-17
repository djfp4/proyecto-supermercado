@extends("../Layouts.plantilla")

@section("cabecera")
<h1>Estos son los salarios</h1>
@endsection

@section("contenido")

	<table border="1">
		<tr>
			<td>Salario</td><td>Descuentos</td>
		</tr>
		
		@foreach($salario as $salarios)

			<tr>
				<td><a href="{{route('salarios.edit',$salarios->id)}}"> {{$salarios->salario}}</a></td>
				<td>{{$salarios->descuentos}}</td>
			</tr>

		@endforeach
	</table>

@endsection