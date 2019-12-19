@extends('layouts.plantilla')
@section('titulo')
Compras
@endsection
@section('contenido')

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
                                <input type="text" id="proveedor" hidden="" name="proveedor_id" value="{{$proveedor->id}}">
                                <input class="form-control" value="{{$proveedor->nombre}}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Producto</label>
                            <div class="col-md-4">
                                <select id="producto_id" class="form-control selectpicker" data-live-search="true">
                                  <option value="0">Elija un producto</option>
                                    @foreach($producto as $productos)
                                        <option value="{{$productos->id}}">{{$productos->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="name" class="col-md-1 col-form-label text-md-right">Lotes</label>
                            <div class="col-md-4">
                                <input id="lotes" type="number" class="form-control">
                            </div>
                        </div>
                        <label id="mensaje_1" class="offset-md-4" style="color: red;">
                          Solo puede ingresar un maximo de 10 digitos
                        </label>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Cantidad por lote</label>
                            <div class="col-md-2">
                                <input id="cant_x_lote" type="number" class="form-control" readonly="">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Cantidad total</label>
                            <div class="col-md-2">
                                <input id="cant_total" type="number" class="form-control" readonly="">
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Precio de compra</label>
                            <div class="col-md-3">
                                <input id="precio_compra" type="number" class="form-control">
                            </div>
                        
                            <label class="col-md-2 col-form-label text-md-right">Precio de venta</label>
                            <div class="col-md-3">
                                <input id="precio_venta" type="number" class="form-control">
                            </div>
                        </div>
                        <label id="mensaje_2" class="offset-md-4" style="color: red;">
                          Solo puede ingresar un maximo de 10 digitos
                        </label>
                        <label id="mensaje_3" class="offset-md-4" style="color: red;">
                          Solo puede ingresar un maximo de 10 digitos
                        </label>

                        <div class="form-group row" id="comprar">
                            <div class="col-md-12 offset-md-12">
                                <button type="button" class="btn btn-success btn-block" id="agregar">Agregar Fila</button>
                            </div>
                        </div>

                        <table class="table table-striped" id="tablacompra">
                            <thead>
                                <th>Producto</th>
                                <th>Lotes</th>
                                <th>Cantidad por lote</th>
                                <th>Cantidad total</th>
                                <th>Precio de compra</th>
                                <th>Precio de venta</th>
                                <th>Subtotal</th>
                                <th>Opciones</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="6"><h3>Total</h3></td>
                                    <td><h3 id="total">0.00</h3></td>
                                </tr>
                            </tfoot>
                                
                            
                        </table>


                        <div class="form-group row" id="guardar">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </form>
       
@push('scripts')

         <script>
           $(document).ready(function(){
            $('#agregar').click(function(){
             agregar();
             });

            $("#mensaje_1").hide();
            $("#mensaje_2").hide();
            $("#mensaje_3").hide();

            $("#lotes").keypress(function(){
              if ($(this).val().length >= 10) {
                $("#mensaje_1").show(); 
                setTimeout(function() {
                    $("#mensaje_1").fadeOut(1500);
                },3000);
                return false;
              }
              else {
                $("#mensaje_1").hide();
              }
            });

        $("#lotes").keyup(function(){
          if ($(this).val().length < 10) {
            $("#mensaje_2").hide();
          }
        });

            $("#precio_compra").keypress(function(){
              if ($(this).val().length >= 10) {
                $("#mensaje_2").show(); 
                setTimeout(function() {
                    $("#mensaje_2").fadeOut(1500);
                },3000);
                return false;
              }
              else {
                $("#mensaje_2").hide();
              }
            });

        $("#precio_compra").keyup(function(){
          if ($(this).val().length < 10) {
            $("#mensaje_2").hide();
          }
        });

        $("#precio_venta").keypress(function(){
          if ($(this).val().length >= 10) {
            $("#mensaje_3").show(); 
            setTimeout(function() {
            $("#mensaje_3").fadeOut(1500);
              },3000);
            return false;
          }
          else {
            $("#mensaje_3").hide();
          }
        });

        $("#precio_venta").keyup(function(){
          if ($(this).val().length < 10) {
            $("#mensaje_3").hide();
          }
        });

            $('#lotes').change(function(){
              if ($("#cant_x_lote").val()!="") {
                lotes = $("#lotes").val();
                cant = $("#cant_x_lote").val();
                $("#cant_total").val(lotes*cant);
              }
            });

         $("#producto_id").change(function () {
          $("#producto_id option:selected").each(function () {
            if ($(this).val()=="0") {
              $("#cant_x_lote").val("");
              $("#cant_total").val("");
              $("#stock").val("");
            }
            else{

              id = $(this).val();
              $.post("{{route('cantidad')}}", {"_token": '{{csrf_token()}}' ,id: id }, function(data){
                datos=parseInt(data);
                lotes = $("#lotes").val();
                $("#cant_x_lote").val(datos);
                $('#cant_total').val(datos*lotes);
              }); 

            }

            });
          })

       });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();

  function agregar(){
    idproveedor=$("#proveedor").val();
    proveedor=$("#proveedor_id option:selected").text();
    idproducto=$("#producto_id").val();
    producto=$("#producto_id option:selected").text();
    lotes=$("#lotes").val();
    cant_x_lote=$("#cant_x_lote").val();
    cant_total=$("#cant_total").val();
    stock=$("#stock").val();
    precio_compra=$("#precio_compra").val();
    precio_venta=$("#precio_venta").val();
    
      if (idproducto != 0 && idproveedor!="" && lotes!="" && lotes>0  && precio_compra!="" && precio_compra>0 && precio_venta!="" && precio_venta>0)
      {
         subtotal[cont]=(cant_x_lote * lotes * precio_compra);
         total=total+subtotal[cont];

         var fila='<tr class="selected" id="fila'+cont+'">'+
         '<td><input type="hidden" name="idproveedor[]" value="'+idproveedor+'" class="form-control"><input type="hidden" name="idproducto[]" class="form-control" value="'+idproducto+'">'+producto+'</td>'+
         '<td><input type="number" readonly class="form-control" name="lotes[]" value="'+lotes+'"></td>'+
         '<td><input type="number" readonly class="form-control" value="'+cant_x_lote+'"></td>'+
         '<td><input type="number" readonly class="form-control" value="'+cant_total+'"></td>'+
         '<td><input type="number" readonly class="form-control" name="precio_compra[]" value="'+precio_compra+'"></td>'+
         '<td><input type="number" readonly class="form-control" name="precio_venta[]" value="'+precio_venta+'"></td>'+
         '<td>'+subtotal[cont]+'</td>'+
         '<td><button type="button" class="btn btn-danger btn-block" onclick="eliminar('+cont+');">X</button></td></tr>';
         cont++;
         limpiar();
         $("#total").html(total);
         evaluar();
         $('#tablacompra').append(fila);
         

      }
      else
      {
        alert("Debe llenar todos los campos")
      }
  
  }
  function limpiar(){
    $("#lotes").val("");
    $("#precio_compra").val("");
    $("#precio_venta").val("");
  }

  function evaluar()
  {
    if (parseInt(total)>0)
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
    $("#total").html(total);   
    $("#fila" + index).remove();
    evaluar();

  }
         </script>

@endpush
@endsection