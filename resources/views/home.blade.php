@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Mercaplus
                </div>

                <div class="card-body"><ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/empleados" class="btn btn-primary">Listado de empleados</a></li>
                        <li class="list-group-item"><a href="/empleados/create" class="btn btn-primary">Registrar empleados</a></li>
                        <li class="list-group-item"><a href="/register" class="btn btn-primary">Registrar usuarios</a></li>
                    </ul>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
