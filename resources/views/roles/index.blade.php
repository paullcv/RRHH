@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lista de Roles</h3>
                </div>
                <!-- Otros elementos del encabezado si los hay -->
            </div>
        </div>     
        <!-- Primera tabla con todos los roles -->
        <div class="card-body">
            <h5>Roles Disponibles</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Rol</th>
                        <!-- Otros encabezados según tu modelo Role -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <!-- Otras celdas con información de cada rol -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Segunda tabla con usuarios y sus roles -->
        <div class="card-body">
            <h5>Usuarios y sus Roles</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del Usuario</th>
                        <th>Rol Asignado</th>
                        <th>Asignar Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->roles->isNotEmpty())
                                {{ $user->roles->first()->name }}
                            @else
                                Sin Rol
                            @endif
                        </td>
                        <td>
                            @if($user->roles->isEmpty())
                                <form action="{{ route('roles.assign', $user->id) }}" method="POST">
                                    @csrf
                                    <select name="role">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Asignar Rol</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
