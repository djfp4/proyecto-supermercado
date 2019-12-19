<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Empleado;
use App\Cargo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('verificarCargo');
        $this->middleware('verificarInventario');
        $this->middleware('verificarVentas');
    }

    public function index(){
        $usuario = User::select("users.id","name","descripcion","nombre")
        ->join("empleados","empleados.id","=","users.empleado_id")
        ->join("cargos","cargos.id","=","users.cargo_id")
        ->paginate(4);
        return view("usuarios.index",compact("usuario"));
    }
    public function edit($id){
        $usuario = User::select("users.id","name","descripcion","ci_nit","cargo_id","empleado_id","password")
        ->join("empleados","users.empleado_id","=","empleados.id")
        ->join("cargos","users.cargo_id","=","cargos.id")
        ->where("users.id", $id)
        ->first();
        $empleado = Empleado::select("ci_nit")
        ->join("users","users.empleado_id","=","empleados.id")
        ->where('empleados.id','!=',$usuario->empleado_id)
        ->get();
        $cargo = Cargo::select("descripcion")
        ->join("users","users.cargo_id","=","cargos.id")
        ->where('cargos.id','!=',$usuario->cargo_id)
        ->get();
        return view("usuarios.edit",compact("usuario","empleado","cargo"));
    }

    public function update(Request $request, $id){
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());
        return redirect("usuarios");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'empleado_id' => ['required', 'integer'],
            'cargo_id' => ['required','integer'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'empleado_id' => $data['empleado_id'],
            'cargo_id' => $data['cargo_id'],
        ]);
    }
}
