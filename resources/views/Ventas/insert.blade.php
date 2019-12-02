@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de ventas</div>

                <div class="card-body">
                 @include('ventas.modal')
                    <form method="post" action="/ventas">
                        @csrf


                        <div class="form-group row" hidden="">
                            <div class="col-md-6">
                                <input id="usuario_id" type="text" class="form-control" name="usuario_id" value="{{auth()->id()}}" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Cliente</label>
                            <div class="col-md-6">
                                <select id="cliente_id" name="cliente_id" class="form-control selectpicker" data-live-search="true">
                                  <option>Selecciona un cliente</option>
                                    @foreach($cliente as $clientes)
                                        <option value="{{$clientes->id}}">{{$clientes->ci_nit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" id="aCliente"><a href="" data-target="#modal-delete-1" data-toggle="modal"><button class="btn btn-primary">+</button></a></div>
                           
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Producto</label>
                            <div class="col-md-6">
                                <select id="producto_id" class="form-control selectpicker" data-live-search="true">
                                  <option value="0">Selecciona un producto</option>
                                    @foreach($producto as $productos)
                                        <option value="{{$productos->id}}">{{$productos->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                            <div class="col-md-6">
                                <input id="cantidad" type="number" class="form-control" value="0" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Precio</label>
                            <div class="col-md-6">
                                <input id="Precio" type="number" class="form-control" required="">
                            </div>
                        </div>

                        
                        <div class="form-group row" id="comprar">
                            <div class="col-md-12 offset-md-12">
                                <button type="button" class="btn btn-success btn-block" id="agregar">Agregar Fila</button>
                            </div>
                        </div>

                        <table class="table table-striped" id="tablaventa">
                            <thead style="background-color: #24CDBD; color: #fff;">
                         
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Opciones</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><h3>Total</h3></td>
                                    <td><h3 id="total">Bs. 0</h3></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

         <script>
           $(document).ready(function(){
            $("#agregar").click(function(){
              agregar();
            });

            $("#guardar").hide();
              $('#cliente_id').change(function(){
                $('#aCliente').hide();
              });


        $("#producto_id").change(function () {
          $("#producto_id option:selected").each(function () {
            if ($(this).val()=="0") {
              $("#Precio").val("");
            }
            else{

              id = $(this).val();
              $.post("{{route('precio')}}", {"_token": '{{csrf_token()}}' ,id: id }, function(data){
              datos=parseInt(data);
              $("#Precio").val(datos);
            }); 
            }
            

                     
          });
        })

       });

        

  var cont=0;
  total=0;
  subtotal=[];
  

  function agregar(){
    idproducto=$("#producto_id").val();
    producto=$("#producto_id option:selected").text();
    cantidad=$("#cantidad").val();
    precio=$("#Precio").val();

    if (cantidad !="" && cantidad > 0 && idproducto!="")
    {
       subtotal[cont]=(cantidad*precio);
       total=total+subtotal[cont];

       var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="idproducto[]" class="form-control" value="'+idproducto+'">'+producto+'</td><td><input type="number" class="form-control" name="cantidad[]" value="'+cantidad+'"></td><td>'+subtotal[cont]+'</td><td><button type="button" class="btn btn-danger btn-block" onclick="eliminar('+cont+');">X</button></td></tr>';
       cont++;
       limpiar();
       $("#total").html(total);
       evaluar();
       $('#tablaventa').append(fila);
       

    }
    else
    {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
    }
  
  }
  function limpiar(){
    $("#cantidad").val("0");
    $("#producto_id").val("0");
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
    $("#total").html("Bs. "+total);   
    $("#fila" + index).remove();
    evaluar();

  }
         </script>

@endpush
@endsection