<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Jornada;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
   

    public function index()
    {
        $horarios = Horario::with('jornada')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        // Aquí puedes cargar las jornadas para utilizarlas en el formulario de creación
        $jornadas = Jornada::all(); // Esto supone que ya tienes el modelo Jornada definido
        return view('horarios.create', compact('jornadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
            'id_jornada' => 'required',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario creado con éxito.');
    }

    public function edit(Horario $horario)
    {
        // Aquí puedes cargar las jornadas para utilizarlas en el formulario de edición
        $jornadas = Jornada::all(); // Esto supone que ya tienes el modelo Jornada definido
        return view('horarios.edit', compact('horario', 'jornadas'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
            'id_jornada' => 'required',
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado con éxito.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado con éxito.');
    }
}
