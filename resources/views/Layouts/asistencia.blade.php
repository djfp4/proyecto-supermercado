<!DOCTYPE html>
<html>
<head>
	<title>Mercaplus</title>

	<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
		
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">

<style type="text/css">
	body{
		background-color: #ABECE6;
	}
	.card-header {
		color: #fff;
	}
	.card-body{
		background-color: #e3f2fd;
	}
</style>

</head>
<body>

	<br>

	
	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header bg-dark">@yield('titulo') <a href="{{route('login')}}" class="btn btn-outline-light offset-md-10">Login</a></div>
		                <div class="card-body">
							@yield("contenido")
							@stack('scripts')
						</div>
				</div>
            </div>
        </div>
    
</div>




</body>
</html>