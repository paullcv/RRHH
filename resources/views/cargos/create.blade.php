@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Cargo</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('cargos.index') }}" class="btn btn-sm btn-primary">Volver a la Lista</a>
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
                    <label for="nombre">Nombre del Cargo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <!-- Para Crear -->
                <div class="form-group">
                    <label for="existe_vacante">¿Existe vacante?</label><br>
                    <input type="checkbox" id="existe_vacante" name="existe_vacante" value="1">
                    <input type="hidden" name="existe_vacante" value="0">
                </div>



                <div class="form-group">
                    <label for="departamento_id">Departamento:</label>
                    <select name="departamento_id" id="departamento_id" class="form-control">
                        <option value="">Seleccionar departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jornada_id">Jornada:</label>
                    <select name="jornada_id" id="jornada_id" class="form-control">
                        <option value="">Seleccionar jornada</option>
                        @foreach ($jornadas as $jornada)
                            <option value="{{ $jornada->id }}">{{ $jornada->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear Cargo</button>
            </form>
        </div>
    </div>
@endsection
