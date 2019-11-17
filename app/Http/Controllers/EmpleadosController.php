<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Empleado;
use App\User;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleado = Empleado::select('empleados.id','empleados.nombre as emple','empleados.paterno','empleados.materno',
        'empleados.fecha_nac','empleados.telefono','empleados.zona','empleados.avenida','empleados.nro','empleados.cargo','departamentos.nombre')
        ->join('departamentos','empleados.departamento_id','=','departamentos.id')
        ->get();
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
        return redirect('/empleados');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $departamento_ = Departamento::findOrFail($empleado->departamento_id);
        $departamento = Departamento::all();
        return view("Empleados.show",compact("empleado"));
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

        return redirect('/empleados');
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
