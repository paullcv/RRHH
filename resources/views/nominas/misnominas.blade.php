@extends('layouts.panel')

@section('content')
    <style>
        /* Estilo base del círculo */
        .circle {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        /* Clase para el color verde */
        .green {
            background-color: green;
        }

        /* Clase para el color rojo */
        .red {
            background-color: red;
        }
    </style>
    <div class="card shadow">
        @if ($empleado)
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Nóminas</h3>
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
                    @if ($nominas->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            No hay nominas asociados a este empleado.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Fecha de Pago</th>
                                        <th scope="col">Salario</th>
                                        <th scope="col">Deducción (%)</th>
                                        <th scope="col">Bonificación (%)</th>
                                        <th scope="col">Pago Neto</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nominas as $nomina)
                                        <tr>
                                            <td>{{ $nomina->id }} <span
                                                    class="circle {{ $nomina->estado_pago ? 'green' : 'red' }}"></span>
                                            </td>

                                            <td>{{ $nomina->fecha_pago }}</td>
                                            <td>{{ $nomina->salario }}</td>
                                            <td>{{ $nomina->deduccion }}%</td>
                                            <td>{{ $nomina->bonificacion }}%</td>
                                            <td>{{ $nomina->pago_neto }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
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
