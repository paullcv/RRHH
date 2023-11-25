@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Requisitos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('cargos.requisitos.create', $cargoId) }}" class="btn btn-sm btn-primary">Nuevo Requisito</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Mensajes de éxito o error -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Verificar si hay requisitos -->
            @if ($requisitos->isEmpty())
                <div class="alert alert-warning" role="alert">
                    No hay requisitos asociados a este cargo.
                </div>
            @else
                <!-- Tabla de requisitos -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Conocimientos</th>
                                <th scope="col">Experiencia</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requisitos as $requisito)
                                <tr>
                                    <td>{{ $requisito->conocimientos }}</td>
                                    <td>{{ $requisito->experiencia }}</td>
                                    <td>
                                        <!-- Enlaces para editar y eliminar requisitos -->
                                        <a href="{{ route('cargos.requisitos.edit', [$cargoId, $requisito->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{ route('cargos.requisitos.destroy', [$cargoId, $requisito->id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
