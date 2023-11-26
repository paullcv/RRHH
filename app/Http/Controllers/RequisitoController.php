<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Requisito;
use Illuminate\Http\Request;

class RequisitoController extends Controller
{
    public function index($cargoId)
    {
        $requisitos = Requisito::where('cargo_id', $cargoId)->get();
        return view('requisitos.index', compact('cargoId', 'requisitos'));
    }

    public function create($cargoId)
    {
        return view('requisitos.create', compact('cargoId'));
    }

    public function store(Request $request, $cargoId)
    {
        $request->validate([
            'conocimientos' => 'required',
            'experiencia' => 'required',
        ]);

        Requisito::create([
            'conocimientos' => $request->conocimientos,
            'experiencia' => $request->experiencia,
            'cargo_id' => $cargoId, // Asignar el cargo_id al nuevo requisito
        ]);

        return redirect()->route('cargos.requisitos.index', $cargoId)
            ->with('success', 'Requisito creado con éxito.');
    }

    public function edit($cargoId, $requisitoId)
    {
        $requisito = Requisito::findOrFail($requisitoId);
        return view('requisitos.edit', compact('cargoId', 'requisito'));
    }


    public function update(Request $request, $cargoId, $requisitoId)
    {
        $request->validate([
            'conocimientos' => 'required',
            'experiencia' => 'required',
        ]);
    
        $requisito = Requisito::findOrFail($requisitoId);
        $requisito->update([
            'conocimientos' => $request->conocimientos,
            'experiencia' => $request->experiencia,
        ]);
    
        return redirect()->route('cargos.requisitos.index', $cargoId)
            ->with('success', 'Requisito actualizado con éxito.');
    }

    public function destroy($cargoId, $requisitoId)
    {
        $requisito = Requisito::findOrFail($requisitoId);
        $requisito->delete();
        return redirect()->route('cargos.requisitos.index', $cargoId)
            ->with('success', 'Requisito eliminado con éxito.');
    }
}
