<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Proveedor;
use App\Producto;
use App\Detallecompra;


class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware("verificarCargo");
    }

    public function index()
    {
        //
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
    public function compra(Request $request){
        $compras = Compra::all();
        if (!$compras) {
            $id = $compras->last()->id;
            $id++;
        }
        else{
            $id=1;
        }
        
        $producto = Producto::all();
        $compra=['usuario_id'=>$request->usuario_id,'proveedor_id'=>$request->proveedor_id,'id'=>$id];
        return view("detalleCompras.insert", compact("compra","producto"));
    }

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
                $camtidad=$request->get('camtidad');

                $cont=0;

                while ($cont<count($idproducto)) {

                    $detalleCompra = new Detallecompra;
                    $detalleCompra->compra_id=$compra->id;
                    $detalleCompra->producto_id=$idproducto[$cont];
                    $detalleCompra->lotes=$lotes[$cont];
                    $detalleCompra->cant_x_lote=$lotes[$cont];

                    $detalleCompra->save();
                    $cont = $cont + 1;
                }
        
                

            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
