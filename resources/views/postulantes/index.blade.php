@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Postulantes</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('postulantes.create') }}" class="btn btn-sm btn-primary">Nuevo Postulante</a>
                    <a href="{{ route('recibir.datos.api') }}" class="btn btn-sm btn-primary">Resultasdos CV</a>

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

        @if ($postulantes->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay postulantes registrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Currículum</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postulantes as $postulante)
                            <tr>
                                <td>{{ $postulante->nombre }}</td>
                                <td>{{ $postulante->edad }}</td>
                                <td>{{ $postulante->telefono }}</td>
                                <td>{{ $postulante->email }}</td>
                                <td>
                                    @if ($postulante->curriculum)
                                    <a href="{{ asset('storage/CV/' . $postulante->curriculum) }}" target="_blank">Ver currículum</a>
                                    @else
                                        No adjuntado
                                    @endif
                                </td>

                                <td>{{ $postulante->cargo->nombre }}</td>
                                <td>
                                    <form action="{{ route('postulantes.destroy', $postulante->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('postulantes.edit', $postulante->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="{{ route('enviar.datos.api', $postulante->id) }}" class="btn btn-sm btn-primary">Analizar CV</a>
                                        
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
