<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return view('postulantes.index', compact('postulantes'));
    }

    public function create()
    {       
        $cargosDisponibles = Cargo::where('existe_vacante', true)->get();
        return view('postulantes.create', compact('cargosDisponibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'telefono' => 'required',
            'email' => 'required|email|unique:postulantes',
            'curriculum' => 'required',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        Postulante::create($request->all());
        return redirect()->route('welcome')->with('success', 'Postulante creado exitosamente');
    }

    public function show(Postulante $postulante)
    {
        return view('postulantes.show', compact('postulante'));
    }

    public function edit(Postulante $postulante)
    {
        $cargosDisponibles = Cargo::where('existe_vacante', true)->get();
        return view('postulantes.edit', compact('postulante', 'cargosDisponibles'));
       
    }

    public function update(Request $request, Postulante $postulante)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'telefono' => 'required',
            'email' => 'required|email|unique:postulantes,email,' . $postulante->id,
            'curriculum' => 'nullable',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        $postulante->update($request->all());
        return redirect()->route('postulantes.index')->with('success', 'Postulante actualizado exitosamente');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index')->with('success', 'Postulante eliminado exitosamente');
    }
}
