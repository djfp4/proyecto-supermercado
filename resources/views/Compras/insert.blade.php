@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de compras</div>

                <div class="card-body">
                    <form method="post" action="/compras">
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">Producto</label>
                            <div class="col-md-6">
                                <select id="producto_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach($producto as $productos)
                                        <option value="{{$productos->id}}">{{$productos->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Lotes</label>
                            <div class="col-md-6">
                                <input id="lotes" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cantidad por lote</label>
                            <div class="col-md-6">
                                <input id="cant_x_lote" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row" id="comprar">
                            <div class="col-md-12 offset-md-12">
                                <button type="button" class="btn btn-success btn-block" id="agregar">Agregar Fila</button>
                            </div>
                        </div>

                        <table class="table table-striped" id="tablacompra">
                            <thead style="background-color: #24CDBD; color: #fff;">
                         
                                <th>Proveedor</th>
                                <th>Producto</th>
                                <th>Lotes</th>
                                <th>Cantidad por lote</th>
                                <th>Opciones</th>
                            </thead>
                            <tfoot>
                                <tr>
                                   
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
        $('#agregar').click(function(){
         agregar();
         });
       });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();

  function agregar(){
    idproveedor=$("#proveedor_id").val();
    proveedor=$("#proveedor_id option:selected").text();
    idproducto=$("#producto_id").val();
    producto=$("#producto_id option:selected").text();
    cantidad=$("#cant_x_lote").val();
    lotes=$("#lotes").val();

    if (idproveedor!="" && cantidad!="" && cantidad>0 && lotes!="" && lotes>0 && idproducto!="")
    {
       /*subtotal[cont]=(cantidad*precio_compra);
       total=total+subtotal[cont];*/

       var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="idproveedor[]" value="'+idproveedor+'" class="form-control">'+proveedor+'</td><td><input type="hidden" name="idproducto[]" class="form-control" value="'+idproducto+'">'+producto+'</td><td><input type="number" class="form-control" name="lotes[]" value="'+lotes+'"></td><td><input type="number" class="form-control" name="cantidad[]" value="'+cantidad+'"></td><td><button type="button" class="btn btn-warning btn-block" onclick="eliminar('+cont+');">X</button></td></tr>';
       cont++;
       limpiar();
       evaluar();
       $('#tablacompra').append(fila);

    }
    else
    {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
    }
  
  }
  function limpiar(){
    $("#lotes").val("");
    $("#cant_x_lote").val("");
  }

  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }

   function eliminar(index){
    total=total-subtotal[index]; 
    $("#total").html("S/. " + total);   
    $("#fila" + index).remove();
    evaluar();

  }
         </script>

@endpush
@endsection