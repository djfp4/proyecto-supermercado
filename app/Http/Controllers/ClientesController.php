<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("verificarCargo");
        $this->middleware('verificarInventario');
        $this->middleware('verificarRecursos');
    }
    public function index()
    {
        $cliente = Cliente::select("id","nombre","paterno","materno","ci_nit")
        ->where("estado",1)
        ->get();
        return view("clientes.index",compact("cliente"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $cliente = Cliente::findOrFail($id);
        return view("clientes.edit",compact("cliente"));
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
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect("clientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->estado = 0; 
        $cliente->update();
        return redirect("clientes");
    }
}
