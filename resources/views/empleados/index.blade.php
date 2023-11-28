@extends('layouts.panel')

@section('content')
<script>
  .pagination .page-link .fas {
    font-size: 12px; /* Ajusta el tamaño según lo necesites */
}


</script>
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Empleados</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('empleados.create') }}" class="btn btn-sm btn-primary">Nuevo Empleado</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        

        @if ($empleados->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay empleados registrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">CI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Usuario</th>
                            {{-- <th scope="col">Fecha de Nacimiento</th> --}}
                            <th scope="col">Sexo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->ci }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->cargo->nombre }}</td>
                                <td>{{ $empleado->user->name }}</td>
                                {{-- <td>{{ $empleado->fecha_nacimiento }}</td> --}}
                                <td>{{ $empleado->sexo }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>
                                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('empleados.edit', $empleado->id) }}"
                                            class="btn btn-sm btn-primary">Editar</a>
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        <a href="{{ route('empleados.nominas.index', $empleado->id) }}" class="btn btn-sm btn-info">Nominas</a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
                {{-- <div class="pagination justify-content-center">
                    {{ $empleados->links() }}
                </div>
                 --}}
                {{-- {{ $empleados->links() }} --}}
            </div>
        @endif
    </div>
@endsection
