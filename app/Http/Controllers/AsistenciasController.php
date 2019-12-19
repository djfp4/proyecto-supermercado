<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asistencia;
use App\Empleado;
use Auth;

class AsistenciasController extends Controller
{
    
    public function index()
    {
        Auth::logout();
        return view("asistencias.index");
    }

    public function create()
    {
        return view("asistencias.insert");
    }

    public function store(Request $request)
    {
        $ci= Empleado::select("id")
        ->where("ci_nit",$request->ci_nit)
        ->first();
        if (!empty($ci->id)) {
            $asistencia = new Asistencia();
            $asistencia->fecha_hora_entrada=now();
            $asistencia->empleado_id=$ci->id;

            $asistencia->save();

            return view("asistencias.index");
        }
        else
        {
            return view("asistencias.insert");
        }
        
        

    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view("asistencias.edit");
    }

    public function update(Request $request, $id)
    {
        $idE=Empleado::select("id")
        ->where("ci_nit",$request->ci_nit)
        ->first();

        if (!empty($idE->id)) {

            $asist = Asistencia::select("id")
            ->where("empleado_id",$idE->id)
            ->orderBy("created_at",'desc')
            ->first();
            $asistencia = Asistencia::findOrFail($asist->id);
            $asistencia->fecha_hora_salida=now();

            $asistencia->update();
        }
        else
        {
            return view("asistencias.insert");
        }
        
    }

    public function destroy($id)
    {
        //
    }
}
