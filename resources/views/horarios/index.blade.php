@extends('layouts.panel') {{-- Asegúrate de que la estructura del layout sea adecuada --}}

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Horarios</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('horarios.create') }}" class="btn btn-sm btn-primary">Nuevo Horario</a>
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

        @if ($horarios->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay horarios registrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Hora de Entrada</th>
                            <th scope="col">Hora de Salida</th>
                            <th scope="col">ID de Jornada</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td>{{ $horario->id }}</td>
                                <td>{{ $horario->hora_entrada }}</td>
                                <td>{{ $horario->hora_salida }}</td>
                                <td>{{ $horario->jornada->tipo }}</td>
                                {{-- <td>{{ $horario->id_jornada }}</td> --}}
                                <td>
                                    <a href="{{ route('horarios.edit', $horario->id) }}"
                                       class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST"
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
