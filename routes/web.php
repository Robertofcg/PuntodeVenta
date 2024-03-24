<?php

use Illuminate\Support\Facades\Route;

Route::get('/historialProd', function () {
    return view('Historial');
});
//rutas de acceso a datos
Route::get('/', function () {
    return view('Acceso');
});
Route::post('/validar','App\Http\Controllers\Empleado\login@acceso');

//Rutas de ticket
Route::get('/filtrando','App\Http\Controllers\Ventas\HistorialVenta@filtrarrango');
Route::post('/tic','App\Http\Controllers\Ventas\ventas@tic');
//rutas de ventas
Route::get('/buscar','App\Http\Controllers\Ventas\ventas@buscar');
Route::post('/vender','App\Http\Controllers\Ventas\ventas@vender');

Route::get('/principal','App\Http\Controllers\Ventas\ventas@pventa');
Route::get('/filtrar','App\Http\Controllers\Ventas\HistorialVenta@filtrar');
Route::get('/carrito','App\Http\Controllers\Ventas\ventas@carrito');
Route::post('/cobrar','App\Http\Controllers\Ventas\ventas@realizar');

//Route::get('/historialProd','App\Http\Controllers\Ventas\HistorialVenta@listar');
Route::get('/historialProd',function () {
    return view('Historial');
});
//rutas de productos
Route::get('/EditarPr', function () {
    return view('ProductosE');
});

Route::get('/Elimproductos', function () {
    return view('ProductosEl');
});

Route::get('/Productos', function () {
    return view('ProductosR');
});
Route::get('/RegistroP','App\Http\Controllers\producto\Producto@llenado');
Route::post('/registroProducto','App\Http\Controllers\producto\Producto@Registro');
Route::get('/listaProducto','App\Http\Controllers\producto\Producto@listar');
Route::get('/EliminarProd/{prod}','App\Http\Controllers\producto\Producto@EliminarProducto');
Route::get('/EditarPr/{prod}','App\Http\Controllers\producto\Producto@EditarProducto');
Route::post('/actualizaProd','App\Http\Controllers\producto\Producto@ActualizaProducto');
Route::get('/filtro','App\Http\Controllers\producto\Producto@cambia');


//rutas de proveedor
Route::get('/RegistroProvee', function () {
    return view('ProveedorR');
});
Route::get('/EditarProvee', function () {
    return view('ProveedorE');
});
Route::get('/EliminarProvee', function () {
    return view('ProveedorEl');
});

Route::post('/regisPro','App\Http\Controllers\Proveedor\proveedorController@regisPro');

Route::get('/EditarPro/{pro}','App\Http\Controllers\Proveedor\proveedorController@EditarPro');

Route::post('/actualizaPro','App\Http\Controllers\Proveedor\proveedorController@ActualizaPro');

Route::get('/EliminarPro/{pro}','App\Http\Controllers\Proveedor\proveedorController@EliminarProveedor');

Route::get('/EliminarProvee','App\Http\Controllers\Proveedor\proveedorController@Mostrar');

Route::get('/filtroprov','App\Http\Controllers\Proveedor\proveedorController@cambia');


//Rutas de empleado
Route::get('/alta', function () {
    return view('Empleado');
});
Route::post('/altaP','App\Http\Controllers\Empleado\altaEmpleado@altaP');

Route::get('/editarE', function () {
    return view('EmpleadoE');
});

Route::get('/EmpleadosEl', function(){
    return view("EmpleadosEl");
});
Route::get('/ListaEmp','App\Http\Controllers\Empleado\ListaEmpleado@listar');

Route::get('/filtroemp','App\Http\Controllers\Empleado\ListaEmpleado@cambia');

Route::get('/editarE/{usr}','App\Http\Controllers\Empleado\Update@Editar');
Route::post('/actualizaEmp','App\Http\Controllers\Empleado\Update@actualizar');

Route::get('/EliminarEmp/{usr}','App\Http\Controllers\Empleado\Update@EliminarEmpleado');
Route::get('/BajaEmp/{usr}','App\Http\Controllers\Empleado\Update@BajaEmpleado');
Route::get('/RealtaEmp/{usr}','App\Http\Controllers\Empleado\Update@RealtaEmpleado');

Route::get('/salir','App\Http\Controllers\Empleado\login@salir');
