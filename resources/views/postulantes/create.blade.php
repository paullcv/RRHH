<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ config('app.name') }}
    </title>
    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    
</head>

<body class="">

    <div class="main-content">
        <!-- Navbar -->
        
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-4 pt-md-6">
         
        </div>
        <div class="container-fluid mt--7">

            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Crear Nuevo Postulante</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('welcome') }}" class="btn btn-sm btn-primary">cancelar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> Por favor, corrige los errores en el formulario.
                        </div>
                    @endif
        
                    <form action="{{ route('postulantes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="edad">Edad:</label>
                            <input type="number" name="edad" class="form-control" value="{{ old('edad') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
        
                        <div class="form-group">
                            <label for="curriculum">Currículum:</label>
                            <input type="file" name="curriculum" class="form-control-file" required>
                        </div>
        
                        <div class="form-group">
                            <label for="cargo_id">Cargo:</label>
                            <select name="cargo_id" class="form-control" required>
                                @foreach ($cargosDisponibles as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            @include('includes.panel.footer')
        </div>
    </div>
    <!--   Core   -->
    <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('js/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
</body>

</html>

{{-- 
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Crear Nuevo Postulante</div>

                    <div class="card-body">
                        <form action="{{ route('postulantes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" name="telefono" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cargo_id">Cargo:</label>
                                <select name="cargo_id" class="form-control" required>
                                    @foreach($cargosDisponibles as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curriculum">Currículum:</label>
                                <input type="file" name="curriculum" class="form-control-file" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Postulante</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
