@extends('layouts.plantilla')
@section('titulo')
Editar usuario 
@endsection

@section('contenido')

                    <form method="POST" action="../../usuarios/{{$usuario->id}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name}}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" value="{{$usuario->password}}" required autocomplete="new-password">

                            </div>
                        </div>

                    

                    <div class="form-group row">
                            <label for="empleado_id" class="col-md-4 col-form-label text-md-right">{{ __('Id de empleado') }}</label>

                            <div class="col-md-4">
                                <select id="cargo" class="form-control selectpicker" data-live-search="true" name="empleado_id"  required>
                                    <option value="{{$usuario->empleado_id}}">{{$usuario->ci_nit}}</option>
                                    @foreach($empleado as $empleados)
                                    <option value="{{$empleados->id}}">{{$empleados->ci_nit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-4">
                                <select id="cargo" class="form-control selectpicker" data-live-search="true" name="cargo_id" required>
                                    <option value="{{$usuario->cargo_id}}">{{$usuario->descripcion}}</option>
                                    @foreach($cargo as $cargos)
                                    <option value="{{$cargos->id}}">{{$cargos->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary col-md-3">
                                    Registrar
                                </button>
                                <a href="{{route('usuarios.index')}}" class="btn btn-success col-md-3">Volver</a>
                            </div>
                        </div>
                    </form>
             
@endsection
