<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('asistencias.index', compact('empleados'));
        // $asistencias = Asistencia::all();
        // return view('asistencias.index', compact('asistencias'));
    }

    public function marcarAsistencia(Request $request, $empleadoId)
    {
        // Crear una nueva asistencia con la fecha y hora actual
        Asistencia::create([
            'fecha_asistencia' => Carbon::now()->toDateString(),
            'hora_entrada' => Carbon::now()->toTimeString(),
            'hora_salida' => null,
            'empleado_id' => $empleadoId,
        ]);

        return redirect()->route('asistencias.show', $empleadoId)
            ->with('success', 'Asistencia marcada correctamente.');
    }


    public function show(string $empleadoid)
    {
        $asistencias = Asistencia::where('empleado_id', $empleadoid)->get();
        $empleado = Empleado::findOrFail($empleadoid);
        return view('asistencias.show', compact('asistencias', 'empleadoid', 'empleado'));
    }

    public function marcarSalida($empleadoId, $asistenciaId)
    {
        $asistencia = Asistencia::findOrFail($asistenciaId);

        if ($asistencia) {
            $asistencia->hora_salida = Carbon::now()->toTimeString();
            $asistencia->save();

            return redirect()->route('asistencias.show', $empleadoId)
                ->with('success', 'Hora de salida marcada correctamente.');
        } else {
            return redirect()->route('asistencias.show', $empleadoId)
                ->with('error', 'No se encontró una asistencia para marcar la salida.');
        }
    }

    public function misAsistencias()
    {
        $usuarioid = Auth::user()->id;
        $empleado = Empleado::where('user_id', $usuarioid)->first();

        if ($empleado) {
            $empleadoId = $empleado->id;

            $asistencias = Asistencia::where('empleado_id', $empleadoId)->get();

            return view('asistencias.show', compact('asistencias', 'empleadoId', 'empleado'));
        } else {
            // Manejar el caso en que no se encuentra el empleado correspondiente al usuario
            return view('asistencias.show', compact('empleado'));
        }
        
    }
}
