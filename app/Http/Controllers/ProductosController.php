<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::select('productos.id','productos.nombre as prod','productos.lotes', 'productos.cant_x_lote','productos.precio_compra','productos.precio_venta','categorias.nombre')
        ->join('categorias','productos.categoria_id','=','categorias.id')
        ->get();
        return view ("Productos.index", compact("producto"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view("productos.insert",compact("categoria"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->lotes=$request->lotes;
        $producto->cant_x_lote=$request->cant_x_lote;
        $producto->precio_compra=$request->precio_compra;
        $producto->precio_venta=$request->precio_venta;
        $producto->categoria_id=$request->categoria_id;
        $producto->estado=1;

        $producto->save();
        return redirect("\productos");
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
        $producto=Producto::findOrFail($id);
        $categoria=Categoria::findOrFail($producto->categoria_id);
        $categorias=Categoria::all();
        return view("productos.edit",compact("producto","categoria","categorias"));
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
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect("/productos");
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
