<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use App\User;
use App\Producto;
use App\Detalleventa;

class VentasController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        $producto=Producto::all();
        $cliente=Cliente::all();
        return view("ventas.insert",compact("producto","cliente"));
    }

    public function precio(Request $request)
    {
        $consulta = Producto::findOrFail($request->id);
        $precio = $consulta->precio_venta;
        return $precio;
    }

    public function store(Request $request)
    {
        try
        {

            $venta = new Venta();
                $venta->usuario_id=$request->get('usuario_id');
                $venta->cliente_id=$request->get('cliente_id');
                $venta->fecha_hora_actual=now();
                $venta->estado=1;
                $venta->save();

                $idproducto=$request->get('idproducto');
                $cantidad=$request->get('cantidad');
                $cont=0;

                while ($cont<count($idproducto)) {

                    $detalleVenta = new Detalleventa;
                    $detalleVenta->venta_id=$venta->id;
                    $detalleVenta->producto_id=$idproducto[$cont];
                    $detalleVenta->cantidad=$cantidad[$cont];
                    $detalleVenta->save();

                    $cont = $cont + 1;
                }

                return redirect("ventas/{{$venta->id}}/show");
            
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public function show($id)
    {
        $venta = Venta::select("ventas.id","clientes.paterno","clientes.nombre","users.name","clientes.ci_nit")
        ->join("clientes","clientes.id","=","ventas.cliente_id")
        ->join("users","users.id","=","ventas.usuario_id")
        ->where("ventas.id", $id)
        ->first();
        $detalleVenta = Detalleventa::select("productos.nombre","precio_venta","cantidad")
        ->join("productos","productos.id","=","detalleVentas.producto_id")
        ->join("ventas","ventas.id","=","detalleVentas.venta_id")
        ->where("venta_id", $id)
        ->get();

        return view("ventas.show", compact("venta","detalleVenta"));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
