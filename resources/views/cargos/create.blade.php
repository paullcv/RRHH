@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Nuevo Cargo</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('cargos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos:</label>
                    <textarea class="form-control" id="requisitos" name="requisitos">{{ old('requisitos') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo') }}">
                </div>
                <div class="form-group">
                    <label for="id_horario">Horario:</label>
                    <select class="form-control" id="id_horario" name="id_horario">
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}">{{ $horario->hora_entrada }} to {{ $horario->hora_salida }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Crear Cargo</button>
            </form>
        </div>
    </div>
@endsection
