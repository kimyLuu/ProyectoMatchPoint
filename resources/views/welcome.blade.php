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
            color: #2c3e50;
        }

        /* Imagen de ancho completo */
        #hero-image {
            width: 100%;
            height: 400px;
            background: url('{{ asset("img/Horizontal.jpg") }}') no-repeat center center/cover;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        #hero-image h1 {
            font-size: 4rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* Sección de Equipos y Gastrobar */
        section {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        section img {
            flex: 0 0 45%;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        section .content {
            flex: 1;
            text-align: center;
        }

        section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        section p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px 0;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Imagen de ancho completo con título -->
    <header>
        <div id="hero-image">
            <h1>MatchPoint</h1>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="navigation">
        <div class="container">
            <ul class="menu">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="btn-link">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="btn-link">Iniciar sesión</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="btn-link">Registrarse</a></li>
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
                <h2>Equipos de Pádel</h2>
                <p>Encuentra los mejores equipos para disfrutar al máximo.</p>
                <p><strong>¿QUÉ PODEMOS OFRECER?</strong><br>
                    - Alquiler de pistas<br>
                    - Venta de material<br>
                    - Clases, torneos y entrenamientos<br>
                    - Mantenimiento de instalaciones
                </p>
            </div>
        </section>

        <!-- Gastrobar -->
        <section id="gastrobar">
            <img src="{{ asset('img/gastrobar.jpg') }}" alt="Gastrobar">
            <div class="content">
                <h2>Gastrobar</h2>
                <p>Disfruta de la mejor comida después de tu partida.</p>
            </div>
        </section>

         <!-- Salud -->
         <section id="salud">
            <img src="{{ asset('img/Horizontal.jpg') }}" alt="juego">
            <div class="content">
                <h2>Salud</h2>
                <p>"El pádel no solo fortalece tu cuerpo, sino también tu mente; es la forma perfecta de cuidar tu salud mientras te diviertes.".</p>
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
