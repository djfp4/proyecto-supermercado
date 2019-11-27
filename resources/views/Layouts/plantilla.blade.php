<!DOCTYPE html>
<html>
<head>
	<title>Mercaplus</title>

	<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
	@stack('scripts')
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">



</head>
<body>

<div class="cabecera">
	@yield("cabecera")
</div>

<div class="contenido">
	@yield("contenido")
</div>

<div class="pie">
	@yield("pie")
</div>


</body>
</html>