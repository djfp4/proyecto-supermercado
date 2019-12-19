@extends('layouts.plantilla')
@section('titulo')
Registro de usuario 
@endsection

@section('contenido')

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                    <div class="form-group row">
                            <label for="empleado_id" class="col-md-4 col-form-label text-md-right">{{ __('Id de empleado') }}</label>

                            <div class="col-md-4">
                                <select id="cargo" class="form-control @error('cargo') is-invalid @enderror selectpicker" data-live-search="true" name="empleado_id" value="{{ old('cargo') }}"  required>
                                    @foreach($Empleado as $Empleados)
                                    <option value="{{$Empleados->id}}">{{$Empleados->ci_nit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-4">
                                <select id="cargo" class="form-control @error('cargo') is-invalid @enderror selectpicker" data-live-search="true" name="cargo_id" value="{{ old('cargo') }}" required>
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
                                <button type="reset" class="btn btn-danger col-md-3">
                                    Borrar campos
                                </button>
                            </div>
                        </div>
                    </form>
             
@endsection
