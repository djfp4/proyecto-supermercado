<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asistencia;
use App\Empleado;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("asistencias.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("asistencias.insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=Empleado::select("id")
        ->where("ci_nit",$request->ci_nit)
        ->first();
        $asistencia = new Asistencia();
        $asistencia->fecha_hora_entrada=now();
        $asistencia->empleado_id=$id->id;

        $asistencia->save();
        return view("asistencias.index");

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
    public function edit()
    {
        return view("asistencias.edit");
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
        $idE=Empleado::select("id")
        ->where("ci_nit",$request->ci_nit)
        ->first();
        $asist = Asistencia::select("id")
        ->where("empleado_id",$idE->id)
        ->orderBy("created_at",'desc')
        ->first();
        $asistencia = Asistencia::findOrFail($asist->id);
        $asistencia->fecha_hora_salida=now();

        $asistencia->update();
        return view("asistencias.index");
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
