<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\JornadaController;
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
});

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