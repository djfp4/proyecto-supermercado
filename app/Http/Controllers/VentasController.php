<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use App\User;
use App\Producto;
use App\Detalleventa;
use DB;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class VentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificarInventario');
        $this->middleware('verificarRecursos');
    }
    public function index()
    {
        $venta = Venta::select("nombre","paterno","name","ventas.id","fecha_actual")
        ->join("clientes","clientes.id","=","ventas.cliente_id")
        ->join("users","users.id","=","ventas.usuario_id")
        ->get();
        return view("ventas.index", compact("venta"));
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
                $venta->fecha_actual=now();
                $venta->hora_actual=now();
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

                    $producto=Producto::findOrFail($detalleVenta->producto_id);
                    $producto->total=$producto->total-$detalleVenta->cantidad;
                    $producto->update();

                    $cont = $cont + 1;
                }

                return redirect("ventas/".$venta->id);
            
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public function storeCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->paterno=$request->paterno;
        $cliente->materno=$request->materno;
        $cliente->ci_nit=$request->ci_nit;
        $cliente->usuario_id=auth()->id();
        $cliente->estado=1;

        $cliente->save();

        return redirect("ventas/create");
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
        $total = DB::table("detalleVentas")
        ->select(DB::raw("sum(cantidad * precio_venta) as total"))
        ->join("productos","productos.id","=","detalleVentas.producto_id")
        ->where("venta_id",$id)
        ->first();
        $total->total = round((float)$total->total,2);


        return view("ventas.show", compact("venta","detalleVenta","total"));
    }

    public function pdf()
    {        
        
        $venta = Venta::all(); 

        $pdf = PDF::loadView('ventas.pdf', compact('venta'));

        return $pdf->download('listado.pdf');
    }
    public function factura($id)
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
        $total = DB::table("detalleVentas")
        ->select(DB::raw("sum(cantidad * precio_venta) as total"))
        ->join("productos","productos.id","=","detalleVentas.producto_id")
        ->where("venta_id",$id)
        ->first();

        $total->total = round((float)$total->total,2);
        $pdf = PDF::loadView("ventas.pdf", compact("venta","detalleVenta","total"));
        return $pdf->setOrientation('landscape')->stream('listado.pdf');
        
    }

    public function edit($id)
    {
        $producto = Detalleventa::select("nombre","detalleventas.cantidad","detalleventas.id","detalleventas.producto_id")
        ->join("productos","productos.id","=","detalleventas.producto_id")
        ->where("detalleventas.id",$id)
        ->first();
        return view("ventas.edit",compact("producto"));
    }

    public function update(Request $request, $id)
    {
        $detalleventa = Detalleventa::findOrFail($id);
        $detalleventa->update($request->all());

        $producto=Producto::findOrFail($request->producto_id);

            if ($request->dcantidad > $request->cantidad) {
                $pcantidad = $request->dcantidad-$request->cantidad;
                $total  = $pcantidad*$producto->cant_x_lote;
                $producto->total=$producto->total-$total;
            }

            if ($request->dcantidad < $request->cantidad) {
                $pcantidad = $request->cantidad-$request->dcantidad;
                $total  = $pcantidad*$producto->cant_x_lote;
                $producto->total=$producto->total+$total;
            }

        $producto->update();

        return redirect("ventas/".$detalleventa->venta_id);
    }

    public function destroy($id)
    {
        $detalleventa = Detalleventa::findOrFail($id);
        $detalleventa->estado=0;
        
        $precio = detalleventa::select("precio_venta","precio_venta")
        ->where("producto_id",$detalleventa->producto_id)
        ->where("id","!=",$detalleventa->id)
        ->orderBy("id","desc")
        ->first();

        $producto = Producto::findOrFail($detalleventa->producto_id);
        $producto->cantidad=$producto->cantidad-$detalleventa->cantidad;
        $producto->update();

        $detalleventa->update();
        return redirect("ventas");
    }
}
