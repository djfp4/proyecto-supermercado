<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
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
        $departamento = Departamento::select("nombre","descripcion","id")
        ->where("estado",1)
        ->get();
        return view ("Departamentos.index", compact("departamento"));
    }

    public function create()
    {
        return view("Departamentos.insert");
    }

    public function store(Request $request)
    {
        $departamento = new Departamento;
        $departamento->nombre=$request->nombre;
        $departamento->descripcion=$request->descripcion;
        $departamento->estado=1;

        $departamento->save();

        return redirect("departamentos");
    }

    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view("departamentos.show", compact("departamento"));
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view("departamentos.edit",compact("departamento"));
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::findOrFail($id);

        $departamento->update($request->all());

        return redirect("/departamentos");
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->estado = 0;
        $departamento->update();

        return redirect("/departamentos");
    }
}
