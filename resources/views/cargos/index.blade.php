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
                Sin cargos creados por el momento.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Requisitos</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <th scope="row">
                                    {{ $cargo->id }}
                                </th>
                                <td>
                                    {{ $cargo->nombre }}
                                </td>
                                <td>
                                    {{ $cargo->requisitos }}
                                </td>
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
