@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Jornadas</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('jornadas.create') }}" class="btn btn-sm btn-primary">Nueva Jornada</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('notificacion'))
                <div class="alert alert-success" role="alert">
                    {{ session('notificacion') }}
                </div>
            @endif
        </div>

        @if ($jornadas->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay jornadas registradas.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jornadas as $jornada)
                            <tr>
                                <td>{{ $jornada->id }}</td>
                                <td>{{ $jornada->tipo }}</td>
                                <td>
                                    <a href="{{ route('jornadas.edit', $jornada->id) }}"
                                       class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('jornadas.destroy', $jornada->id) }}" method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro?')">Eliminar
                                        </button>
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
