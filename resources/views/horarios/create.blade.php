@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Nuevo Horario</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('horarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="hora_entrada">Hora de Entrada:</label>
                    <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ old('hora_entrada') }}">
                </div>
                <div class="form-group">
                    <label for="hora_salida">Hora de Salida:</label>
                    <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ old('hora_salida') }}">
                </div>
                <div class="form-group">
                    <label for="id_jornada">Jornada:</label>
                    <select class="form-control" id="id_jornada" name="id_jornada">
                        @foreach($jornadas as $jornada)
                            <option value="{{ $jornada->id }}">{{ $jornada->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear Horario</button>
            </form>
        </div>
    </div>
@endsection
