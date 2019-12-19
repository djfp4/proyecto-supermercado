<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salario;
use App\Empleado;

class SalariosController extends Controller
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
        $salario = Salario::all();
        return view ("salarios.index", compact("salario"));
    }

    public function create()
    {
        $empleado = Empleado::all();
        return view("Salarios.insert",compact("empleado"));
    }

    public function store(Request $request)
    {
        $salario = new Salario;
        $salario->salario=$request->salario;
        $salario->descuentos=$request->descuentos;
        $salario->afp=$request->afp;
        $salario->empleado_id=$request->empleado_id;
        $salario->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $empleado = Empleado::all();
        $salario = Salario::findOrFail($id);
        $empleado_nom = Empleado::findOrFail($salario->empleado_id);

        return view("salarios.edit",compact("empleado","salario","empleado_nom"));
    }

    public function update(Request $request, $id)
    {
        $salario = Salario::findOrFail($id);

        $salario->update($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
