@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Cargo</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('cargos.update', $cargo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cargo->nombre }}">
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos:</label>
                    <textarea class="form-control" id="requisitos" name="requisitos">{{ $cargo->requisitos }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $cargo->tipo }}">
                </div>
                <div class="form-group">
                    <label for="id_horario">Horario:</label>
                    <select class="form-control" id="id_horario" name="id_horario">
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}" @if($horario->id === $cargo->id_horario) selected @endif>{{ $horario->hora_entrada }} - {{ $horario->hora_salida }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Cargo</button>
            </form>
        </div>
    </div>
@endsection
