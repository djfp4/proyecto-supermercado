@extends('layouts.plantilla')
@section('titulo')
Compras
@endsection
@section('contenido')
<form method="get" action="/compras/create">
                        @csrf


                        <div class="form-group row" hidden="">
                            <div class="col-md-6">
                                <input id="usuario_id" type="text" class="form-control" name="usuario_id" value="{{auth()->id()}}" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Proveedor</label>
                            <div class="col-md-6">
                                <select id="proveedor_id" name="proveedor_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach($proveedor as $proveedores)
                                        <option value="{{$proveedores->id}}">{{$proveedores->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Continuar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
@endsection                   