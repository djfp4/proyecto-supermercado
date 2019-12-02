@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar compra</div>

                <div class="card-body">
                    <form method="post" action="/compras/{{$compra->c}}">
                        @csrf


                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Proveedor</label>
                            <div class="col-md-6">
                                <select id="proveedor_id" name="proveedor_id" class="form-control selectpicker" data-live-search="true">
                                  <option selected="" value="{{$compra->proveedor_id}}">
                                    {{$compra->nombre}}
                                  </option>
                                    @foreach($proveedor as $proveedores)
                                        <option value="{{$proveedores->id}}">{{$proveedores->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <table class="table table-striped" id="tablacompra">
                            <thead style="background-color: #24CDBD; color: #fff;">
                         
                                <th>Producto</th>
                                <th>Lotes</th>
                                <th>Cantidad por lote</th>
                                <th>Precio de compra</th>
                                <th>Precio de venta</th>
                                <th>Subtotal</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                              @foreach($detalleCompra as $detalleCompras)

                              <tr class="selected" id="fila'+cont+'">
                                <td><input type="hidden" name="idproveedor[]" value="{{$detalleCompras->proveedor}}" class="form-control">
                                  <select name="idproducto[]" class="form-control">
                                    <option selected="" value="{{$detalleCompras->producto_id}}">{{$detalleCompras->producto}}
                                    </option>
                                    @foreach($producto as $productos)
                                      <option value="{{$productos->id}}">{{$productos->nombre}}</option>
                                    @endforeach
                                  </selct>
                                </td>
                                <td><input type="number" class="form-control" name="lotes[]" value="{{$detalleCompras->lotes}}"></td>
                                <td><input type="number" class="form-control" name="cant_x_lote[]" value="{{$detalleCompras->cant_x_lote}}"></td>
                                <td><input type="number" class="form-control" name="precio_compra[]" value="{{$detalleCompras->precio_compra}}"></td>
                                <td><input type="number" class="form-control" name="precio_venta[]" value="{{$detalleCompras->precio_venta}}"></td>
                                <td><label id="subtotal"></label></td>
                                <td><a href="#" class="btn btn-danger">Eliminar</a></td>
                              </tr>

                              @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"><h3>Total</h3></td>
                                    <td><h3 id="total">0.00</h3></td>
                                </tr>
                            </tfoot>
                                
                            
                        </table>


                        <div class="form-group row" id="comprar">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Comprar
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

         <script>
           $(document).ready(function(){
          sumar();
       });

  total=0;
  subtotal=[];

  function sumar(){

    cant_x_lote=$("#cant_x_lote").val();
    lotes=$("#lotes").val();
    precio_compra=$("#precio_compra").val();
    filas=$("#tablacompra").length;

       
       for (var i = 0; i < filas; i++) {
         subtotal[i]=(cant_x_lote[i] * lotes[i] * precio_compra[i]);
         total=total+subtotal[i];
       }

       $("#total").html(total);
       
  }
         </script>

@endpush
@endsection