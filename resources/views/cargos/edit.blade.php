@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Cargo</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('cargos.index') }}" class="btn btn-sm btn-primary">Volver a la Lista</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Por favor, corrige los errores en el formulario.
                </div>
            @endif

            <form action="{{ route('cargos.update', $cargo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cargo->nombre) }}" required>
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos</label>
                    <textarea name="requisitos" id="requisitos" class="form-control">{{ old('requisitos', $cargo->requisitos) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
