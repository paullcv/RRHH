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
                <label for="nombre">Nombre del Cargo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cargo->nombre }}">
            </div>
            <!-- Para Editar -->
            <div class="form-group">
                <label for="existe_vacante">¿Existe vacante?</label><br>
                <input type="checkbox" id="existe_vacante" name="existe_vacante" value="1" {{ $cargo->existe_vacante ?
                'checked' : '' }}>
                <input type="hidden" name="existe_vacante" value="0">
            </div>
            <div class="form-group">
                <label for="departamento_id">Departamento:</label>
                <select name="departamento_id" id="departamento_id" class="form-control">
                    @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" @if ($cargo->departamento_id == $departamento->id) selected
                        @endif>
                        {{ $departamento->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jornada_id">Jornada:</label>
                <select name="jornada_id" id="jornada_id" class="form-control">
                    @foreach ($jornadas as $jornada)
                    <option value="{{ $jornada->id }}" @if ($cargo->jornada_id == $jornada->id) selected @endif>
                        {{ $jornada->tipo }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Cargo</button>
        </form>
    </div>
</div>
@endsection