@extends('layouts.plantilla')

@section('titulo')
Editar compra
@endsection
@section('contenido')
<div class="container">
  <form method="post" action="/compras/{{$producto->id}}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Producto</label>
                            <div class="col-md-4">
                                <input type="text" name="producto_id" hidden="" value="{{$producto->producto_id}}">
                                <input type="text" name="" value="{{$producto->nombre}}" readonly="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Lotes</label>
                            <div class="col-md-4">
                                <input type="number" value="{{$producto->lotes}}" hidden="" name="dlotes" autofocus="">
                                <input type="number" class="form-control" value="{{$producto->lotes}}" required="" name="lotes" autofocus="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Precio de compra</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" value="{{$producto->precio_compra}}" required="" name="precio_compra">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Precio de venta</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" value="{{$producto->precio_venta}}" required="" name="precio_venta">
                            </div>
                        </div>

                        <div class="form-group row" id="comprar">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                                <a href="{{route('compras.show', $producto->id)}}" class="btn btn-danger col-md-3">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection