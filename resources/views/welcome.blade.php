<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatchPoint</title>

    <!-- Estilos gestionados por Vite -->
    @vite(['resources/css/app.css', 'resources/css/styles.css'])

    <style>
        /* General */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Imagen de ancho completo */
        #hero-image {
            width: 100%;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-top: 80px; 
        }

        /* Sección de Equipos */
        #equipos {
            display: flex;
            align-items: center;
            gap: 90px;
            margin: 50px 0;
           
        }

        #equipos img {
            flex: 0 0 50%; /* Imagen ocupa el 50% del ancho */
            max-width: 500px; /* Limita el tamaño máximo */
            border-radius: 20px;
            
            
        }

        #equipos .content {
            flex: 1; /* El contenido ocupa el espacio restante */
        }

        /* Sección de Gastrobar */
        #gastrobar {
            display: flex;
            align-items: center;
            flex-direction: row-reverse; /* Imagen a la derecha */
            gap: 50px;
            margin: 50px 0;
        }

        #gastrobar img {
            flex: 0 0 80%; /* Imagen ocupa el 50% del ancho */
            max-width: 500px; /* Limita el tamaño máximo */
            border-radius: 20px;
        }

        #gastrobar .content {
            flex: 50; /* El contenido ocupa el espacio restante */
        }
    </style>
</head>
<body>
    <!-- Imagen de ancho completo -->
    <header>
        <img id="hero-image" src="{{ asset('img/Horizontal.jpg') }}" alt="Imagen principal de pádel">
    </header>

    <!-- Navegación -->
    <nav class="navigation">
        <div class="container">
            <ul class="menu">
        
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="btn-link">matchpoint</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="btn-link">Iniciar sesión</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="btn-link">Registrarse</a></li>
                        @endif
                    @endauth
                    @auth
                        <!-- Menú visible para todos los usuarios autenticados -->
                        @if(Auth::user()->role == 'client' || Auth::user()->role == 'admin')
                            <li><a href="{{ route('calendar.index') }}">Reserva</a></li>
                        @endif

                        <!-- Menú exclusivo para administradores -->
                        @if(Auth::user()->role == 'admin')
                            <li><a href="{{ route('reservations.index') }}">Gestión de Reservas</a></li>
                        @endif
                    @endauth
                @endif
                

               
 
            </ul>
        </div>
    </nav>

    <!-- Secciones -->
    <main>
        <!-- Equipos -->
        <section id="equipos">
            <img src="{{ asset('img/equipo.jpg') }}" alt="Equipos de pádel">
            <div class="content">
                <h2 class="section-title">Equipos de Pádel</h2>
                <p>Encuentra los mejores equipos para disfrutar al máximo.</p>
                <p>
                <strong>¿QUÉ PODEMOS OFRECER?</strong><br>
                - El proyecto y la construcción de las pistas de pádel (homologadas y con certificado de calidad de todos los materiales).<br>
                - Gestión y funcionamiento de las pistas a través de «pistas inteligentes».<br>
                - Publicidad y promoción del servicio, a través de acuerdos con escuelas e instituciones locales, cursos, torneos.<br>
                - Mantenimiento y limpieza de las instalaciones.
            </p>
            </div>
        </section>

        <!-- Gastrobar -->
        <section id="gastrobar">
            <img src="{{ asset('img/gastrobar.jpg') }}" alt="Gastrobar">
            <div class="content">
                <h2 class="section-title">Gastrobar</h2>
                <p>Disfruta de la mejor comida después de tu partida.</p>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024 MATCHPOINT. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts gestionados por Vite -->
    @vite('resources/js/app.js')
</body>
</html>
