@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <h3 class="mb-0">Crear Nuevo Nomina para el Empleado: {{ $empleadoId }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.nominas.store', $empleadoId) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="number" id="salario" name="salario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="deduccion">Deducción (%)</label>
                    <input type="number" id="deduccion" name="deduccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="bonificacion">Bonificación (%)</label>
                    <input type="number" id="bonificacion" name="bonificacion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
