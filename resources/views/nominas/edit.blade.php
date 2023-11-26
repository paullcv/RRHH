@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Nomina</h3>
                </div>
                <div class="col text-right">
                    @if (!$nomina->estado_pago)
                    <form action="{{ route('empleados.nominas.confirmar_pago', [$empleadoId, $nomina->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Confirmar Pago</button>
                    </form>                        
                    @else
                        <p>El pago ha sido confirmado</p>
                    @endif


                </div>
            </div>
          
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.nominas.update', [$empleadoId, $nomina->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" value="{{ $nomina->fecha_pago }}" required>
                </div>
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="number" id="salario" name="salario" class="form-control" value="{{ $nomina->salario }}" required>
                </div>
                <div class="form-group">
                    <label for="deduccion">Deducción (%)</label>
                    <input type="number" id="deduccion" name="deduccion" class="form-control" value="{{ $nomina->deduccion }}" required>
                </div>
                <div class="form-group">
                    <label for="bonificacion">Bonificación (%)</label>
                    <input type="number" id="bonificacion" name="bonificacion" class="form-control" value="{{ $nomina->bonificacion }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        
            
        </div>
    </div>
@endsection
