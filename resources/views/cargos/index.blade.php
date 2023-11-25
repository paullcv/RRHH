@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Cargos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('cargos.create') }}" class="btn btn-sm btn-primary">Nuevo Cargo</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        @if ($cargos->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay cargos registrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">vacante</th>

                            <th scope="col">Jornada</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td>{{ $cargo->id }}</td>
                                <td>{{ $cargo->nombre }}</td>
                                <td>{{ $cargo->departamento->nombre }}</td>
                                <td>{{ $cargo->existe_vacante ? 'Sí' : 'No' }}</td>

                                <td>{{ $cargo->jornada->tipo }}</td>
                                <td>
                                    <form action="{{ route('cargos.destroy', $cargo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-sm btn-primary">Editar</a>
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
@endsection
