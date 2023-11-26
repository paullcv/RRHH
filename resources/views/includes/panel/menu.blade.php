<h6 class="navbar-heading text-muted">Gestion</h6>
<ul class="navbar-nav">
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('/home') }}">
            <i class="ni ni-tv-2 text-danger"></i> Dashboard
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/empleados') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Empleados
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/roles') }}">
            <i class="ni ni-tv-2 text-danger"></i> Roles y Permisos
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/postulantes') }}">
            <i class="ni ni-briefcase-24 text-blue"></i>Gestionar Postulantes
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/departments') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Departamentos
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/cargos') }}">
            <i class="fas fa-procedures text-warning"></i> Gestionar Cargos
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/asistencias') }}">
            <i class="fas fa-procedures text-warning"></i> Gestionar Asistencias
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/horarios') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Horarios
        </a>
    </li>
    @endcan
    @can('Administrador')
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/jornadas') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Jornadas
        </a>
    </li>
    @endcan
    @if(auth()->user()->hasAnyRole(['Administrador', 'Empleado']))
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/misasistencias') }}">
            <i class="fas fa-procedures text-warning"></i> Mis asistencias
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/misNominas') }}">
            <i class="fas fa-procedures text-warning"></i> Mis nominas
        </a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="far fa-calendar-alt text-info"></i> Reportes Ventas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="far fa-chart-bar text-blue"></i> Reportes Ganancias
        </a>
    </li>
