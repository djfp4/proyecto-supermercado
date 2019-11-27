<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;

class CargosController extends Controller
{
    public function index()
    {
        $cargo = Cargo::All();
        return view("Cargos.index", compact($cargo));
    }

    public function create()
    {
        return view("Cargos.insert");
    }

    public function store(Request $request)
    {
        $cargo = new Cargo();
        $cargo->descripcion=$request->descripcion;
        $cargo->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
