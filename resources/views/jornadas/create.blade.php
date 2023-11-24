@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Crear Nueva Jornada</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('jornadas.index') }}" class="btn btn-sm btn-primary">Volver a la Lista</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> Revisa los campos requeridos.
                </div>
            @endif
            <form action="{{ route('jornadas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo') }}">
                </div>
                <button type="submit" class="btn btn-primary">Crear Jornada</button>
            </form>
        </div>
    </div>
@endsection
