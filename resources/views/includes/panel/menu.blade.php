<h6 class="navbar-heading text-muted">Gestion</h6>
<ul class="navbar-nav">
    <li class="nav-item  active ">
        <a class="nav-link  active " href="{{ url('/home') }}">
            <i class="ni ni-tv-2 text-danger"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="ni ni-briefcase-24 text-blue"></i>Gestionar Postulantes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="ni ni-tv-2 text-danger"></i> Roles y Permisos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/empleados') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Empleados
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="fas fa-procedures text-warning"></i> Gestionar Asistencias
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/horarios') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Horarios
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{ url('/jornadas') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Jornadas
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{ url('/departments') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Gestionar Departamentos
        </a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/cargos') }}">
            <i class="fas fa-procedures text-warning"></i> Gestionar Cargos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/cargos') }}">
            <i class="fas fa-procedures text-warning"></i> Mis asistencia
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/cargos') }}">
            <i class="fas fa-procedures text-warning"></i> Mis nominas
        </a>
    </li>
  
  
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