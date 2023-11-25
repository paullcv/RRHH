<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use Illuminate\Http\Request;

class NominaController extends Controller
{
    public function index($empleadoId)
    {
        // Lógica para obtener las nóminas de un empleado específico
        $nominas = Nomina::where('empleado_id', $empleadoId)->get();
        return view('nominas.index', compact('empleadoId', 'nominas'));
    }

    public function create($empleadoId)
    {
        // Muestra el formulario para crear una nueva nómina para el empleado especificado
        return view('nominas.create', compact('empleadoId'));
    }

    public function store(Request $request, $empleadoId)
    {
        // Validar los campos recibidos del formulario de creación de nómina
        $request->validate([
            'fecha_pago' => 'required|date',
            'salario' => 'required|numeric',
            'deduccion' => 'required|numeric',
            'bonificacion' => 'required|numeric',
        ]);

        // Calcular el pago neto
        $pagoNeto = $request->salario + $request->bonificacion - $request->deduccion;

        // Crear una nueva instancia de Nomina y guardarla en la base de datos
        Nomina::create([
            'fecha_pago' => $request->fecha_pago,
            'salario' => $request->salario,
            'deduccion' => $request->deduccion,
            'bonificacion' => $request->bonificacion,
            'pago_neto' => $pagoNeto,
            'estado_pago'=>false,
            'empleado_id' => $empleadoId,
        ]);

        return redirect()->route('empleados.nominas.index', $empleadoId)
            ->with('success', 'Nómina creada exitosamente.');
    }


    public function show($empleadoId, $nominaId)
    {
        $nomina = Nomina::findOrFail($nominaId);
        return view('nominas.show', compact('empleadoId', 'nomina'));
    }

    public function edit($empleadoId, $nominaId)
    {
        $nomina = Nomina::findOrFail($nominaId);
        return view('nominas.edit', compact('empleadoId', 'nomina'));
    }

    public function update(Request $request, $empleadoId, $nominaId)
    {
        $request->validate([
            'fecha_pago' => 'required|date',
            'salario' => 'required|numeric',
            'deduccion' => 'required|numeric',
            'bonificacion' => 'required|numeric',
        ]);

        $porcentajeBonificacion = $request->bonificacion;
        $porcentajeDeduccion = $request->deduccion;

        // Calcular el valor de la bonificación y la deducción
        $valorBonificacion = ($porcentajeBonificacion / 100) * $request->salario;
        $valorDeduccion = ($porcentajeDeduccion / 100) * $request->salario;

        // Calcular el pago neto
        $pagoNeto = $request->salario + $valorBonificacion - $valorDeduccion;

        // Actualizar los datos de la nómina
        $nomina = Nomina::findOrFail($nominaId);
        $nomina->update([
            'fecha_pago' => $request->fecha_pago,
            'salario' => $request->salario,
            'deduccion' => $request->deduccion,
            'bonificacion' => $request->bonificacion,
            'pago_neto' => $pagoNeto,
        ]);

        return redirect()->route('empleados.nominas.index', $empleadoId)
            ->with('success', 'Nómina actualizada exitosamente.');
    }

    public function destroy($empleadoId, $nominaId)
    {
        // Eliminar una nómina específica
        $nomina = Nomina::findOrFail($nominaId);
        $nomina->delete();
        return redirect()->route('empleados.nominas.index', $empleadoId)
            ->with('success', 'Nómina eliminada exitosamente.');
    }

    public function confirmarPago($empleadoId, $nominaId)
    {
        $nomina = Nomina::findOrFail($nominaId);

        // Actualizar el estado de pago a true
        $nomina->update([
            'estado_pago' => true,
        ]);

        return redirect()->route('empleados.nominas.edit', [$empleadoId, $nominaId])
            ->with('success', 'Pago confirmado exitosamente.');
    }
}
