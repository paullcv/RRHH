<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jornadas = Jornada::with('horario')->get();
        return view('jornadas.index', compact('jornadas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horarios = Horario::all();
        return view('jornadas.create', compact('horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'horario_id' => 'required',
        ]);

        $horario = Horario::find($request->horario_id);

        if (!$horario) {
            // Manejar si no se encuentra el horario
            
        }

        // Calcular la diferencia de tiempo para obtener la cantidad de horas
        $diferenciaHoras = strtotime($horario->hora_salida) - strtotime($horario->hora_entrada);
        $cantidadHoras = round($diferenciaHoras / 3600); // 3600 segundos en una hora

        // Crear la jornada con la cantidad de horas calculada
        Jornada::create([
            'tipo' => $request->tipo,
            'cantidad_horas' => $cantidadHoras,
            'horario_id' => $request->horario_id,
        ]);

        return redirect()->route('jornadas.index')->with('success', 'Jornada creada con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jornada $jornada)
    {
        $horarios = Horario::all();
        return view('jornadas.edit', compact('jornada', 'horarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jornada $jornada)
    {
        $request->validate([
            'tipo' => 'required',
            'horario_id' => 'required',
        ]);

        $horario = Horario::find($request->horario_id);
        if (!$horario) {
            // Manejar si no se encuentra el horario
        }

        // Calcular la diferencia de tiempo para obtener la cantidad de horas
        $diferenciaHoras = strtotime($horario->hora_salida) - strtotime($horario->hora_entrada);
        $cantidadHoras = round($diferenciaHoras / 3600); // 3600 segundos en una hora
        $jornada->update([
            'tipo' => $request->tipo,
            'cantidad_horas' => $cantidadHoras,
            'horario_id' => $request->horario_id,
        ]);

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
