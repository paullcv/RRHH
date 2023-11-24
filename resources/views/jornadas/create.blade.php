@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Nueva Jornada</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('jornadas.index') }}" class="btn btn-sm btn-primary">Volver a la Lista</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('jornadas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo') }}">
                </div>
               
                <div class="form-group">
                    <label for="horario_id">Seleccionar Horario:</label>
                    <select name="horario_id" id="horario_id" class="form-control" required>
                        <option value="">Seleccionar un horario</option>
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario->id }}">{{ $horario->hora_entrada }} - {{ $horario->hora_salida }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear Jornada</button>
            </form>
        </div>
    </div>
@endsection
