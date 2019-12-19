<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Departamento;

class PuestosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("verificarCargo");
        $this->middleware('verificarInventario');
        $this->middleware('verificarVentas');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $departamento = Departamento::all();
        return view("puestos.insert",compact("departamento"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto = new Puesto();
        $puesto->cargo=$request->cargo;
        $puesto->hora_entrada=$request->hora_entrada;
        $puesto->hora_salida=$request->hora_salida;
        $puesto->departamento_id=$request->departamento_id;
        $puesto->save();
        return redirect("empleados");
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
