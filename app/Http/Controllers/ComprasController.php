<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Proveedor;
use App\Producto;
use App\Detallecompra;
use App\User;
use DB;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificarCargo');
        $this->middleware('verificarVentas');
        $this->middleware('verificarRecursos');
    }

    public function index(Request $request)
    {
        $fecha1 = $request->get('fecha1');
        $fecha2 = $request->get('fecha2');
        $proveedor_id = $request->get('proveedor');
        $orden = $request->get('orden');
        if (empty($orden)) {
            $orden = "asc";
        }
        $compra = Compra::select("compras.id","users.name","proveedores.nombre","compras.fecha_actual","compras.hora_actual")
        ->join("proveedores","compras.proveedor_id","=","proveedores.id")
        ->join("users","compras.usuario_id","=","users.id")
        ->Fecha($fecha1, $fecha2)
        ->ProveedorId($proveedor_id)
        ->orderBy("compras.fecha_actual", "".$orden."")
        ->paginate(4);

        $compra2 = Compra::select("compras.id","users.name","proveedores.nombre","compras.fecha_actual","compras.hora_actual")
        ->join("proveedores","compras.proveedor_id","=","proveedores.id")
        ->join("users","compras.usuario_id","=","users.id")
        ->Fecha($fecha1, $fecha2)
        ->ProveedorId($proveedor_id)
        ->orderBy("compras.fecha_actual", "".$orden."")
        ->get();
        $proveedor = Proveedor::all();
        session(['reporte'=>$compra2]);
        return view("Compras.index",compact("compra","proveedor"));
    }

    public function reporte()
    {     
        $compra = session('reporte');

        $pdf = PDF::loadView('compras.pdf', compact('compra'));

        return $pdf->stream('compras.pdf');
    }

    public function proveedor(){
        $proveedor = Proveedor::all();
        return view("compras.proveedor", compact("proveedor"));
    }

    public function create(Request $request)
    {
        /*$producto = Producto::select("productos.id","nombre")
        ->join("detallecompras","productos.id","=","detallecompras.producto_id")
        ->join("compras","detallecompras.compra_id","=","compras.id")
        ->where("compras.proveedor_id", $request->proveedor_id)
        ->groupBy("productos.id")
        ->get();*/
        $proveedor = Proveedor::findOrFail($request->proveedor_id);
        $producto = Producto::all();
        /*$proveedor = Proveedor::all();*/
        return view("compras.insert", compact("proveedor","producto"));
    }

    public function cantidad(Request $request)
    {
        $consulta = Producto::findOrFail($request->id);
        $cantidad = $consulta->cant_x_lote;
        return $cantidad;
    }
    public function total(Request $request)
    {
        $consulta = Producto::findOrFail($request->id);
        $total = $consulta->total;
        return $total;
    }

    public function store(Request $request)
    {
        try
        {

            $compra = new Compra();
                $compra->usuario_id=$request->get('usuario_id');
                $compra->proveedor_id=$request->get('proveedor_id');
                $compra->fecha_actual=now();
                $compra->hora_actual=now();
                $compra->estado=1;
                $compra->save();

                $idproducto=$request->get('idproducto');
                $idproveedor=$request->get('idproveedor');
                $lotes=$request->get('lotes');
                $cant_x_lote=$request->get('cant_x_lote');
                $precio_compra=$request->get('precio_compra');
                $precio_venta=$request->get('precio_venta');

                $cont=0;

                while ($cont < count($idproducto)) {

                    $detalleCompra = new Detallecompra;
                    $detalleCompra->compra_id=$compra->id;
                    $detalleCompra->producto_id=$idproducto[$cont];
                    $detalleCompra->lotes=$lotes[$cont];
                    $detalleCompra->precio_compra=$precio_compra[$cont];
                    $detalleCompra->precio_venta=$precio_venta[$cont];
                    $detalleCompra->estado=1;
                    $detalleCompra->save();

                    $producto = Producto::findOrFail($idproducto[$cont]);
                    $producto->total=$producto->total+($producto->cant_x_lote*$detalleCompra->lotes);
                    $producto->precio_compra=$precio_compra[$cont];
                    $producto->precio_venta=$precio_venta[$cont];
                    $producto->update();
                    $cont = $cont + 1;
                }
        
                return redirect("compras");

            
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public function show($id)
    {
        $detalleCompra = Detallecompra::select("detalleCompras.id","productos.nombre","detalleCompras.lotes","productos.cant_x_lote","detalleCompras.precio_compra","detalleCompras.precio_venta","categorias.nombre as categoria")
        ->join("productos","productos.id","=","detalleCompras.producto_id")
        ->join("categorias","categorias.id","=","productos.categoria_id")
        ->where('detalleCompras.compra_id',$id)
        ->where('detalleCompras.estado',1)
        ->get();

        $subtotal = DB::table("detalleCompras")
        ->select(DB::raw("sum(detallecompras.precio_compra*lotes*cant_x_lote) AS subtotal"))
        ->join("productos","productos.id","=","detalleCompras.producto_id")
        ->where("compra_id", $id)
        ->where('detalleCompras.estado',1)
        ->first();

        session(['detalle' => $detalleCompra]);
        session(['subtotal' => $subtotal]);

        return view("compras.show", compact("detalleCompra","subtotal"));
    }

    public function reporteDetalle()
    {     
        $detalleCompra = session('detalle');
        $subtotal = session('subtotal');

        $pdf = PDF::loadView('compras.pdfDetalle', compact('detalleCompra','subtotal'));

        return $pdf->setOrientation('landscape')->stream('compras.pdfDetalle');
    }

    public function edit($id){
        $producto = Detallecompra::select("nombre","detalleCompras.lotes","detalleCompras.precio_compra","detalleCompras.precio_venta","detalleCompras.id","detalleCompras.producto_id")
        ->join("productos","productos.id","=","detalleCompras.producto_id")
        ->where("detalleCompras.id",$id)
        ->first();
        return view("compras.edit",compact("producto"));
    }

    public function update(Request $request, $id)
    {
        $detalleCompra = Detallecompra::findOrFail($id);
        $detalleCompra->update($request->all());

        $producto=Producto::findOrFail($request->producto_id);

            if ($request->dlotes > $request->lotes) {
                $plotes = $request->dlotes-$request->lotes;
                $total  = $plotes*$producto->cant_x_lote;
                $producto->total=$producto->total-$total;
            }

            if ($request->dlotes < $request->lotes) {
                $plotes = $request->lotes-$request->dlotes;
                $total  = $plotes*$producto->cant_x_lote;
                $producto->total=$producto->total+$total;
            }

        $producto->precio_compra=$request->precio_compra;
        $producto->precio_venta=$request->precio_venta;
        $producto->update();

        return redirect("compras/".$detalleCompra->compra_id);
    }

    public function destroy($id)
    {
        $detalleCompra = Detallecompra::findOrFail($id);
        $detalleCompra->estado=0;
        
        $precio = detalleCompra::select("precio_compra","precio_venta")
        ->where("producto_id",$detalleCompra->producto_id)
        ->where("id","!=",$detalleCompra->id)
        ->orderBy("id","desc")
        ->first();

        $producto = Producto::findOrFail($detalleCompra->producto_id);
        $producto->lotes=$producto->lotes-$detalleCompra->lotes;
        $producto->cant_x_lote=$detalleCompra->cant_x_lote;
        $producto->precio_compra=$precio->precio_compra;
        $producto->precio_venta=$precio->precio_venta;
        $producto->update();

        $detalleCompra->update();
        return redirect("compras");
    }
}
