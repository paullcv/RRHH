<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jornadas = Jornada::all();
        return view('jornadas.index', compact('jornadas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jornadas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        Jornada::create($request->all());

        return redirect()->route('jornadas.index')->with('success', 'Jornada creada con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jornada $jornada)
    {
        return view('jornadas.edit', compact('jornada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jornada $jornada)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        $jornada->update($request->all());

        return redirect()->route('jornadas.index')->with('success', 'Jornada actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jornada $jornada)
    {
        $jornada->delete();

        return redirect()->route('jornadas.index')->with('success', 'Jornada eliminada con éxito.');
    }

    
}
