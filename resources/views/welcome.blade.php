<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- cosas de plantilla --}}
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />

</head>
<body class="page-top">    
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">Argon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
    
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @if (Route::has('login'))
                <div class="navbar-nav ms-auto">
                    @auth
                    <a href="{{ url('/home') }}" class="nav-link">Panel</a>
                    @else
                    <a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a>
    
                    @if (Route::has('register'))
                    {{-- <a href="{{ route('register') }}" class="nav-link">Registro</a> --}}
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>
    
    <!-- Encabezado -->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Argon</h1>
                <h2 class="masthead-subheading mb-0">Construyendo Innovación</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5"  href="{{ route('postulantes.create') }}">Postulate</a>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Más Información</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    
    <!-- Sección de contenido 1 -->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle"
                        src="https://media.istockphoto.com/id/1477822603/es/foto/profesionales-que-tienen-una-reuni%C3%B3n-de-equipo-en-una-oficina.jpg?s=612x612&w=0&k=20&c=-1jYcDKSTz37_GZYgnPMHtHdWYevnia5sMykBA-bTro=" 
                        alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Únete a Nuestro Equipo Innovador</h2>
                        <p>¿Apasionado por la tecnología? ¡Únete a nosotros para crear soluciones innovadoras que redefinen el futuro!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección de contenido 2 -->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle"
                         src="https://media.istockphoto.com/id/1499714951/es/foto/hombre-sosteniendo-una-bombilla-encendida-que-brilla-para-comenzar-una-nueva-idea-innovaci%C3%B3n-e.jpg?s=612x612&w=0&k=20&c=qmmuNk3R8Uq3DtUgoaofc-l1iAiI_W9hRLsUBS6pR6M=" 
                         alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Soluciones Impulsadas por la Tecnología</h2>
                        <p>En Argon, aprovechamos la tecnología para resolver problemas complejos e impulsar la innovación en cada proyecto.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección de contenido 3 -->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" 
                        src="https://media.istockphoto.com/id/1471444549/es/foto/empresario-analizando-negocios-gesti%C3%B3n-de-datos-empresariales-an%C3%A1lisis-de-negocios-con.jpg?s=612x612&w=0&k=20&c=GuiNamQIsBdWJPIGt0bL6gvjp48nE647TOImqt-Me8Q=" 
                        alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Innovar y Crecer</h2>
                        <p>Únete a una cultura de innovación constante. Ofrecemos la plataforma para que crezcas personal y profesionalmente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container px-5">
            <p class="m-0 text-center text-white small">Copyright &copy; Argon 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
