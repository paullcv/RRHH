@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        @if ($empleado)
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Lista de Asistencias {{ $empleado->nombre }}</h3>
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
                <form action="{{ route('asistencias.marcar', $empleado->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary">Marcar Asistencia</button>
                </form>
                <br>

                @if ($asistencias->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        No hay asistencias asociados a este empleado.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha Asistencia</th>
                                    <th scope="col">Hora Entrada</th>
                                    <th scope="col">Hora Salida</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->id }}</td>
                                        <td>{{ $asistencia->fecha_asistencia }}</td>
                                        <td>{{ $asistencia->hora_entrada }}</td>
                                        <td>{{ $asistencia->hora_salida }}</td>
                                        <td>
                                            @if ($asistencia->hora_salida === null)
                                                <form
                                                    action="{{ route('asistencias.marcar_salida', ['empleadoId' => $empleado->id, 'asistenciaId' => $asistencia->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">Marcar Hora de
                                                        Salida</button>
                                                </form>
                                            @else
                                                <p class="">listo</p>
                                            @endif
                                        </td>

                                        <!-- Agregar más columnas si es necesario -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @else
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">No es un empleado de la empresa</h3>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
