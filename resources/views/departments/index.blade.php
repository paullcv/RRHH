@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Departamentos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">Nuevo Departamento</a>
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

        @if ($departments->isEmpty())
            <div class="alert alert-warning" role="alert">
                Sin departamentos creados por el momento.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <th scope="row">
                                    {{ $department->id }}
                                </th>
                                <td>
                                    {{ $department->nombre }}
                                </td>
                                <td>
                                    {{ $department->descripcion }}
                                </td>
                                <td>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-primary">Editar</a>
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
