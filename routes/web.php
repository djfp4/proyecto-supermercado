<?php
use App\Departamento;
use App\Empleado;
use App\User;


Route::get('/', function () {

	$user=Auth::user();

	if (isset($user)!=null) {
		if ($user->verificarCargo()==1) {
			echo "Eres administrador";	
		}else{
			echo "Eres cajero";
		}
	}
	

    return view('welcome');
});


Route::resource('/departamentos','DepartamentosController');
Route::resource('/empleados','EmpleadosController');
Route::resource('/salarios','SalariosController');
Route::resource('/cargos','CargosController');
Route::resource('/asistencias','AsistenciasController');
Route::resource('/categorias','CategoriasController');
Route::resource('/productos','ProductosController');
Route::resource('/clientes','ClientesController');
Route::resource('/proveedores','ProveedoresController');
Route::resource('/compras','ComprasController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/departamento/{id}/empleado',function($id){

	return Empleado::where('departamento_id', $id)->get();

});
