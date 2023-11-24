<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\User;
use App\Models\Department;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $users = User::all();
        $departments = Department::all();

        return view('empleados.create', compact('cargos', 'users', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|numeric|unique:empleados',
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string',
            'telefono' => 'required|string',
            'cargo_id' => 'required|exists:cargos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function edit(Empleado $empleado)
    {
        $cargos = Cargo::all();
        $users = User::all();

        return view('empleados.edit', compact('empleado', 'cargos', 'users'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'ci' => 'required|numeric|unique:empleados,ci,' . $empleado->id,
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string',
            'telefono' => 'required|string',
            'cargo_id' => 'required|exists:cargos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}