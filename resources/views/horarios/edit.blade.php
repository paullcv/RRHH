@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Horario</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="hora_entrada">Hora de Entrada:</label>
                    <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ $horario->hora_entrada }}">
                </div>
                <div class="form-group">
                    <label for="hora_salida">Hora de Salida:</label>
                    <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ $horario->hora_salida }}">
                </div>
             
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection
