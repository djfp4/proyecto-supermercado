<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Producto;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificarCargo');
        $this->middleware('verificarVentas');
        $this->middleware('verificarRecursos');
    }
    public function index()
    {
        $producto = Producto::select('productos.id','productos.nombre as prod','productos.total', 'productos.cant_x_lote','productos.precio_compra','productos.precio_venta','categorias.nombre')
        ->join('categorias','productos.categoria_id','=','categorias.id')
        ->where('estado',1)
        ->get();
        return view ("Productos.index", compact("producto"));
    }

    public function create()
    {
        $categoria = Categoria::all();
        return view("productos.insert",compact("categoria"));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->cant_x_lote=$request->cant_x_lote;
        $producto->precio_compra=$request->precio_compra;
        $producto->precio_venta=$request->precio_venta;
        $producto->categoria_id=$request->categoria_id;
        $producto->estado=1;

        $producto->save();
        return redirect("/productos");
    }

    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categoria=Categoria::findOrFail($producto->categoria_id);
        $categorias=Categoria::all();
        return view("productos.edit",compact("producto","categoria","categorias"));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect("/productos");
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado=0;
        $producto->update();

        $compra = Compra::select("estado")
        ->where("producto_id",$id)
        ->get();
        $cont=0;
        while($cont<count($compra)){
            $compra;
        }

        return redirect("/productos");    
    }
}
