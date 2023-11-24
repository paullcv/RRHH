@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Jornada</h3>
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
            <form action="{{ route('jornadas.update', $jornada->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $jornada->tipo }}">
                </div>
                <div class="form-group">
                    <label for="horario_id">Seleccionar Horario:</label>
                    <select name="horario_id" id="horario_id" class="form-control" required>
                        <option value="">Seleccionar un horario</option>
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario->id }}" @if ($jornada->horario_id == $horario->id) selected @endif>
                                {{ $horario->hora_entrada }} - {{ $horario->hora_salida }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Jornada</button>
            </form>
        </div>
    </div>
@endsection
