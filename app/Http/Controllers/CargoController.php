<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Horario;
use Illuminate\Http\Request;

class CargoController extends Controller
{
  
    public function index()
{
    $cargos = Cargo::with(['horario', 'horario.jornada'])->get();
    return view('cargos.index', compact('cargos'));
}


    public function create()
    {
        $horarios = Horario::all();
        return view('cargos.create', compact('horarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'id_horario' => 'required|exists:horarios,id' // Asegura que el id_horario exista en la tabla de horarios
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo creado con éxito.');
    }

    public function edit(Cargo $cargo)
    {
        $horarios = Horario::all();
        return view('cargos.edit', compact('cargo', 'horarios'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'id_horario' => 'required|exists:horarios,id' // Asegura que el id_horario exista en la tabla de horarios
        ]);

        $cargo->update($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado con éxito.');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado con éxito.');
    }
}
