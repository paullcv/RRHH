@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Postulante</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('postulantes.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Por favor, corrige los siguientes errores.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('postulantes.update', $postulante->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $postulante->nombre) }}" required>
                </div>

                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="number" name="edad" class="form-control" value="{{ old('edad', $postulante->edad) }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $postulante->telefono) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $postulante->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="curriculum">Currículum:</label>
                    <input type="file" name="curriculum" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="cargo_id">Cargo:</label>
                    <select name="cargo_id" class="form-control" required>
                        @foreach ($cargosDisponibles as $cargo)
                            <option value="{{ $cargo->id }}" {{ old('cargo_id', $postulante->cargo_id) == $cargo->id ? 'selected' : '' }}>{{ $cargo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection
