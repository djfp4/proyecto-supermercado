@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de compras</div>

                <div class="card-body">
                    <form method="POST" action="{{route('insert')}}">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <input hidden="" id="name" type="text" class="form-control" name="usuario_id" value="{{$compra['usuario_id']}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <div class="col-md-6">
                                <input hidden="" id="name" type="text" class="form-control" name="usuario_id" value="{{$compra['proveedor_id']}}" required >
                            </div>
                        </div>

                        
                        

                        <script type="text/javascript">
                            function agregarFila(){
                                table=document.getElementById("tablaprueba").rows.length;
                                num=table-1;
                                num2=table;
                                var id=document.getElementById("compra_id").value;
                                var nombre=document.getElementById("nombre").value;
                                var lotes=document.getElementById("lotes").value;
                                var cant_x_lote=document.getElementById("cant_x_lote").value;
                                document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>'+num+'</td><td>'+id+'</td><td>'+nombre+'</td><td>'+lotes+'</td><td>'+cant_x_lote+'</td><td><button class="btn btn-danger" onclick="eliminarFila('+num2+')">Eliminar</button></td>';

                                document.getElementById("nombre").value="";
                                var lotes=document.getElementById("lotes").value="0";
                                var cant_x_lote=document.getElementById("cant_x_lote").value="0";
                            }
                            function eliminarFila(num){
                                 var table = document.getElementById("tablaprueba");
                                  /*var fila = document.getElementById("numero");
                                  //console.log(rowCount);
                                  
                                  if(fila <= 1)
                                    alert('No se puede eliminar el encabezado');
                                  else*/
                                    table.deleteRow(num++);
                            }
                        </script>
                        <hr>
                        <table class="table table-striped" id="tablaprueba">
                            <thead>
                                <th>N°</th>
                                <th>Codigo de compra</th>
                                <th>Producto</th>
                                <th>Lotes</th>
                                <th>Cantidad por lote</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td><input id="name" type="text" hidden value="{{$compra['usuario_id']}}">
                                        <input type="text" id="compra_id" value="{{$compra['id']}}" class="form-control" readonly=""></td>
                                    <td><input type="text" id="nombre" class="form-control"></td>
                                    <td><input type="number" id="lotes" class="form-control" value="0"></td>
                                    <td><input type="number" id="cant_x_lote" class="form-control" value="0"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        

                        <div class="form-group row mb-0">
                             <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Continuar
                                </button>               
                            </div>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection