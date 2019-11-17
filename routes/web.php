<?php
use App\Departamento;
use App\Empleado;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/departamentos','DepartamentosController');
Route::resource('/empleados','EmpleadosController');
Route::resource('/salarios','SalariosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/departamento/{id}/empleado',function($id){

	return Empleado::where('departamento_id', $id)->get();

});
