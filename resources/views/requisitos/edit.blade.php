@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Requisito para el Cargo: {{ $cargoId }}</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Formulario para editar requisito -->
            <form action="{{ route('cargos.requisitos.update', [$cargoId, $requisito->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="conocimientos">Conocimientos:</label>
                    <input type="text" class="form-control" id="conocimientos" name="conocimientos" value="{{ old('conocimientos', $requisito->conocimientos) }}">
                </div>
                <div class="form-group">
                    <label for="experiencia">Experiencia:</label>
                    <input type="text" class="form-control" id="experiencia" name="experiencia" value="{{ old('experiencia', $requisito->experiencia) }}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Requisito</button>
            </form>
        </div>
    </div>
@endsection
