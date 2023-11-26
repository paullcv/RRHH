<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\RequisitoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CRUD Departamentos
Route::resource('departments', DepartmentController::class);

//CRUD Cargos
Route::resource('cargos', CargoController::class);

//CRUD Jornada
Route::resource('jornadas', JornadaController::class);

//CRUD Horario
Route::resource('horarios', HorarioController::class);

//CRUD EMPLEADOS
Route::resource('empleados', EmpleadoController::class);

//Requisitos
Route::resource('cargos.requisitos', RequisitoController::class);

//Nominas
Route::resource('empleados.nominas', NominaController::class);
Route::post('/empleados/{empleadoId}/nominas/{nominaId}/confirmar-pago', [NominaController::class, 'confirmarPago'])->name('empleados.nominas.confirmar_pago');
Route::get('misNominas', [NominaController::class, 'myNomina']);

//Asistencias
Route::resource('asistencias', AsistenciaController::class);
Route::post('asistencias/{empleado}/marcar', [AsistenciaController::class, 'marcarAsistencia'])->name('asistencias.marcar');
Route::post('asistencias/{empleadoId}/marcar-salida/{asistenciaId}', [AsistenciaController::class, 'marcarSalida'])->name('asistencias.marcar_salida');
Route::get('misasistencias', [AsistenciaController::class, 'misAsistencias'])->name('asistencias.mis_asistencias');

//Postulante
Route::resource('postulantes', PostulanteController::class);
