<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Proveedor;
use App\Producto;
use App\Detallecompra;
use App\User;
use DB;


class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware("verificarCargo");
    }

    public function index()
    {
        $compra = Compra::select("compras.id","users.name","proveedores.nombre","compras.fecha_hora_actual")
        ->join("proveedores","compras.proveedor_id","=","proveedores.id")
        ->join("users","compras.usuario_id","=","users.id")
        ->get();
        return view("Compras.index",compact("compra"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        return view("compras.insert",compact("proveedor","producto"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try
        {

            $compra = new Compra();
                $compra->usuario_id=$request->get('usuario_id');
                $compra->proveedor_id=$request->get('proveedor_id');
                $compra->fecha_hora_actual=now();
                $compra->save();

                $idproducto=$request->get('idproducto');
                $idproveedor=$request->get('idproveedor');
                $lotes=$request->get('lotes');
                $cant_x_lote=$request->get('cant_x_lote');
                $precio_compra=$request->get('precio_compra');
                $precio_venta=$request->get('precio_venta');

                $cont=0;

                while ($cont<count($idproducto)) {

                    $detalleCompra = new Detallecompra;
                    $detalleCompra->compra_id=$compra->id;
                    $detalleCompra->producto_id=$idproducto[$cont];
                    $detalleCompra->lotes=$lotes[$cont];
                    $detalleCompra->cant_x_lote=$cant_x_lote[$cont];
                    $detalleCompra->precio_compra=$precio_compra[$cont];
                    $detalleCompra->precio_venta=$precio_venta[$cont];

                    $detalleCompra->save();
                    $cont = $cont + 1;
                }
        
                return redirect("productos");

            
        }
        catch(Exception $e){
            echo $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleCompra = Detallecompra::select("detalleCompras.id","productos.nombre","detalleCompras.lotes","detalleCompras.cant_x_lote","detalleCompras.precio_compra","detalleCompras.precio_venta")
        ->join("productos","productos.id","=","detalleCompras.producto_id")
        ->where('detalleCompras.compra_id',$id)
        ->get();

        $subtotal = DB::table("detalleCompras")
        ->select(DB::raw("sum(precio_compra*lotes*cant_x_lote) as subtotal"))
        ->where("compra_id",$id)
        ->groupBy("id")
        ->get();

        return view("compras.show", compact("detalleCompra","subtotal"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAll($id)
    {
        $detalleCompra = Detallecompra::select(
            "detalleCompras.id as id",
            "productos.nombre as producto",
            "detalleCompras.lotes as lotes",
            "detalleCompras.cant_x_lote as cant_x_lote",
            "detalleCompras.precio_compra as precio_compra",
            "detalleCompras.precio_venta as precio_venta",
            "proveedores.nombre as proveedor",
            "compras.proveedor_id as proveedor_id"
        )
        ->join("productos","productos.id","=","detalleCompras.producto_id")
        ->join("compras","compras.id","=","detalleCompras.compra_id")
        ->join("proveedores","proveedores.id","=","compras.proveedor_id")
        ->where('detalleCompras.compra_id', $id)
        ->get();

        $compra = Compra::select("compras.id as c", "compras.proveedor_id", "proveedores.nombre")
        ->join("proveedores","compras.proveedor_id","=","proveedores.id")
        ->where("compras.id",$id)
        ->first();
        
        $proveedor = Proveedor::all();
        $producto = Producto::all();

        return view("compras.edit" , compact("detalleCompra","proveedor","producto","compra"));
    }

    public function edit($id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
