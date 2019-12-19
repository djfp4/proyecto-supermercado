<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Empleado;
use App\User;
use App\Puesto;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificarCargo');
        $this->middleware('verificarInventario');
        $this->middleware('verificarVentas');
    }

    public function index()
    {
        $empleado = Empleado::select('empleados.id','empleados.nombre as emple','empleados.paterno','empleados.materno',
        'empleados.fecha_nac','empleados.ci_nit','empleados.telefono','empleados.zona','empleados.avenida','empleados.nro','puestos.cargo','salario')
        ->join('puestos','empleados.puesto_id','=','puestos.id')
        ->join('salarios','salarios.empleado_id','=','empleados.id')
        ->get();
        return view ("Empleados.index", compact("empleado"));
    }

    public function create()
    {
        $puesto = Puesto::all();
        return view("Empleados.insert",compact("puesto"));
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
        $puesto = Puesto::all();
        $empleado = Empleado::findOrFail($id);
        $puesto_nom = Puesto::findOrFail($empleado->puesto_id);

        return view("empleados.edit", compact("empleado","puesto","puesto_nom"));
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
