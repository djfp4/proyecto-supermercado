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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Mercaplus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
@if(Auth::user()->hasRole('Gerente'))
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('compras.index')}}">Compras <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('ventas.index')}}">Ventas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('empleados.index')}}">Empleados <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('productos.index')}}">Inventario <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('usuarios.index')}}">Usuarios<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('clientes.index')}}">Clientes <span class="sr-only">(current)</span></a>
      </li>
    </ul>
@elseif(Auth::user()->hasRole('Administrador de inventario'))
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('compras.index')}}">Compras <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('productos.index')}}">Inventario <span class="sr-only">(current)</span></a>
      </li>
    </ul>
@elseif(Auth::user()->hasRole('Administrador de ventas'))
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
          <a class="nav-link" href="{{route('ventas.index')}}">Ventas <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{route('clientes.index')}}">Clientes <span class="sr-only">(current)</span></a>
      </li>
     </ul>
@elseif(Auth::user()->hasRole('Administrador de recursos humanos'))
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('empleados.index')}}">Empleados <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('usuarios.index')}}">Usuarios<span class="sr-only">(current)</span></a>
      </li>
    </ul>
@else

     <ul class="navbar-nav mr-auto">
	     <li class="nav-item active">
	        <a class="nav-link" href="{{route('ventas.index')}}">Ventas <span class="sr-only">(current)</span></a>
	     </li>
     </ul>
@endif


  
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">

                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a class="btn btn-outline-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
  </div>
</nav>
	<br>


	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header bg-dark">@yield('titulo')</div>
		                <div class="card-body">
							@yield("contenido")
							@stack('scripts')
						</div>
				</div>
            </div>
        </div>
    
</div>

<div class="pie">
	@yield("pie")
</div>


</body>
</html>