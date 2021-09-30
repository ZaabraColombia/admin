<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Seccion Pedidos
Route::get('/pedidos', [App\Http\Controllers\Ecomerce\pedidosController::class, 'index'])->name('pedidos');
Route::get('/pedidos/busqueda',  [App\Http\Controllers\Ecomerce\pedidosController::class, 'filtroCompras']);
Route::get('/detalleCompra/{referenceCode}',  [App\Http\Controllers\Ecomerce\pedidosController::class, 'detalleCompras']);

//Seecion Perfiles Prof 
Route::get('/perfprof', [App\Http\Controllers\Sprofesional\perfilProfesionalController::class, 'index'])->name('perfprof');
Route::get('/perfprof/busqueda', [App\Http\Controllers\Sprofesional\perfilProfesionalController::class, 'filtroPerfprof']);
Route::get('/detallePerfilProf/{cod}',  [App\Http\Controllers\Sprofesional\perfilProfesionalController::class, 'detallePerfilProf'])->name('detallePerfilProf');
Route::post('/guardarEstadoPerfilProfesional',  [App\Http\Controllers\Sprofesional\perfilProfesionalController::class, 'guardarEstado']);

//pagina Reportes 
Route::get('/reportesSprofesionales', [App\Http\Controllers\Sprofesional\ReportesSprofesionalesController::class, 'index'])->name('reportesSprofesionales');


//Exportar Sprofesionales EXCEL
Route::post('/descargarPerfilesProfesionalesEXL',  [App\Http\Controllers\Sprofesional\ReportesEXL::class, 'descargarPerfilesProfesionalesEXL'])->name('descargarPerfilesProfesionalesEXL');

//Testimonios

Route::get('/testimonios', [App\Http\Controllers\Sprofesional\testimoniosController::class, 'index'])->name('testimonios');
Route::get('/actualizarEstadoTestimonio/{testimonio}/{idEstado}', [App\Http\Controllers\Sprofesional\testimoniosController::class, 'actualizarEstadoTestimonio']);
