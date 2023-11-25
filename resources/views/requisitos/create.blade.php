@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Nuevo Requisito para el Cargo: {{ $cargoId }}</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Formulario para crear requisito -->
            <form action="{{ route('cargos.requisitos.store', $cargoId) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="conocimientos">Conocimientos:</label>
                    <input type="text" class="form-control" id="conocimientos" name="conocimientos" value="{{ old('conocimientos') }}">
                </div>
                <div class="form-group">
                    <label for="experiencia">Experiencia:</label>
                    <input type="text" class="form-control" id="experiencia" name="experiencia" value="{{ old('experiencia') }}">
                </div>
                <button type="submit" class="btn btn-primary">Crear Requisito</button>
            </form>
        </div>
    </div>
@endsection
