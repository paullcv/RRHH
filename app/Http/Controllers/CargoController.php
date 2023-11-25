<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Department;
use App\Models\Jornada;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    public function index()
    {
        $cargos = Cargo::with('departamento', 'jornada')->get();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        $departamentos = Department::all();
        $jornadas = Jornada::all();
        return view('cargos.create', compact('departamentos', 'jornadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'existe_vacante' => 'nullable',
            'departamento_id' => 'required',
            'jornada_id' => 'required',
        ]);

        // Establece el valor booleano correcto para existe_vacante
        $existeVacante = $request->has('existe_vacante') ? true : false;
        $data = $request->except('existe_vacante'); // Excluye el campo existente

        // Agrega el valor booleano correcto para existe_vacante en los datos a guardar
        $data['existe_vacante'] = $existeVacante;

        Cargo::create($data);

        return redirect()->route('cargos.index')->with('success', 'Cargo creado con éxito.');
    }

    public function edit(Cargo $cargo)
    {
        $departamentos = Department::all();
        $jornadas = Jornada::all();
        return view('cargos.edit', compact('cargo', 'departamentos', 'jornadas'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required',
            'existe_vacante' => 'nullable', // Cambia a 'nullable', ya que no es obligatorio
            'departamento_id' => 'required',
            'jornada_id' => 'required',
        ]);

        // Establece el valor booleano correcto para existe_vacante
        $existeVacante = $request->has('existe_vacante') ? true : false;
        $data = $request->except('existe_vacante'); // Excluye el campo existente

        // Agrega el valor booleano correcto para existe_vacante en los datos a actualizar
        $data['existe_vacante'] = $existeVacante;

        $cargo->update($data);

        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado con éxito.');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado con éxito.');
    }
}
