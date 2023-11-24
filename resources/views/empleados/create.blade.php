@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Empleado</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
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

            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="ci">CI:</label>
                    <input type="text" name="ci" id="ci" class="form-control" value="{{ old('ci') }}" required>
                    @error('ci')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
                    @error('direccion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                    @error('fecha_nacimiento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option value="masculino" {{ old('sexo') === 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ old('sexo') === 'femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    @error('sexo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cargo_id">Cargo:</label>
                    <select name="cargo_id" id="cargo_id" class="form-control" required>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>{{ $cargo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('cargo_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Usuario:</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar Empleado</button>
            </form>
        </div>
    </div>
@endsection
