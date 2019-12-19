<?php
use App\Departamento;
use App\Empleado;
use App\User;


Route::get('/', function () {

	/*$user=Auth::user();

	if (isset($user)!=null) {
		if ($user->verificarCargo()==1) {
			echo "Eres administrador";	
		}else{
			echo "Eres cajero";
		}
	}*/
	

    return view('auth/login');
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
Route::get('/compras-proveedor','ComprasController@proveedor')->name('compras.nuevo');

Route::resource('/ventas','VentasController');
Route::get('descargar-factura/{id}','VentasController@factura')->name('ventas.pdf');
Route::get('descargar-compra','ComprasController@reporte')->name('compras.pdf');
Route::get('descargar','ComprasController@reporteDetalle')->name('compras.pdfDetalle');
Route::resource('/puestos','PuestosController');
Route::post('precio', 'VentasController@precio')->name('precio');
Route::post('cantidad', 'ComprasController@cantidad')->name('cantidad');
Route::post('total', 'ComprasController@total')->name('total');
Route::get('usuarios',"Auth\RegisterController@index")->name('usuarios.index');

Route::get('usuarios/{id}/edit',"Auth\RegisterController@edit")->name('usuarios.edit');
Route::put('usuarios/{id}',"Auth\RegisterController@update")->name('usuarios.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/departamento/{id}/empleado',function($id){

	return Empleado::where('departamento_id', $id)->get();

});
