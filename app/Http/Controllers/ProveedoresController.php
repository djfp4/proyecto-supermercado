<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("verificarCargo");
        $this->middleware('verificarVentas');
        $this->middleware('verificarRecursos');
    }
    public function index()
    {
        $proveedor = Proveedor::all();
        return view("proveedores.index",compact("proveedor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proveedores.insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre=$request->nombre;
        $proveedor->telefono=$request->telefono;
        $proveedor->save();

        return redirect("proveedores");
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
        $proveedor=Proveedor::findOrFail($id);
        return view("proveedores.edit",compact("proveedor"));
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
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return redirect("proveedores");
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
