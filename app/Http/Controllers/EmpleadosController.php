<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Empleado;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleado = Empleado::all();
        return view ("Empleados.index", compact("empleado"));
    }

    public function create()
    {
        $departamento = Departamento::all();
        return view("Empleados.insert",compact("departamento"));
    }

    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->nombre=$request->nombre;
        $empleado->paterno=$request->paterno;
        $empleado->materno=$request->materno;
        $empleado->fecha_nac=$request->fecha_nac;
        $empleado->telefono=$request->telefono;
        $empleado->zona=$request->zona;
        $empleado->avenida=$request->avenida;
        $empleado->nro=$request->nro;
        $empleado->cargo=$request->cargo;
        $empleado->departamento_id=$request->departamento_id;
        $empleado->estado=1;

        $empleado->save();
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $departamento = Departamento::all();
        $empleado = Empleado::findOrFail($id);
        $departamento_nom = Departamento::findOrFail($empleado->departamento_id);

        return view("empleados.edit",compact("empleado","departamento","departamento_nom"));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->update($request->all());
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
