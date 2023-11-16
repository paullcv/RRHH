<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'requisitos' => 'nullable',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo creado con éxito.');
    }

    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required',
            'requisitos' => 'nullable',
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
