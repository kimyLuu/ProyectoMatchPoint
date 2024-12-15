<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Bienvenido a MatchPoint') }}
        </h2>
    </x-slot>

         <!-- Contenido principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <!-- Sección: Instalaciones -->
            <section>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-6">Instalaciones</h2>
                <div class="space-y-8">
                    <!-- Imagen y descripción alternadas -->
                    <div class="flex items-center justify-between space-x-4">
                        <img src="{{ asset('img/PistaAbierta.jpg') }}" alt="Pista cubierta" class="w-1/3 rounded-lg shadow-md">
                        <p class="text-gray-800 dark:text-gray-300 flex-1 text-lg">
                            Muchas pistas indoor con las mejores condiciones para tus partidos durante todo el año.
                            Cualquier usuario que disponga de un dispositivo con conexión a internet puede realizar una reserva online.
                            Simplemente tienen que crearse una cuenta en el sistema de reservas con un email, un número de teléfono y una contraseña.
                            Posteriormente deberá acceder al calendario de disponibilidad, buscar la fecha y hora que mejor les venga y finalizar la reserva.




                        </p>
                    </div>
                    <div class="flex items-center justify-between space-x-4 flex-row-reverse">
                        <img src="{{ asset('img/pista4Cerrada.jpg') }}" alt="Zona verde" class="w-1/3 rounded-lg shadow-md">
                        <p class="text-gray-800 dark:text-gray-300 flex-1 text-lg">
                        Si buscas un deporte que te ayude a despejar tu mente de las preocupaciones del día a día y a aliviar el estrés, el pádel
                        puede ser una excelente respuesta . Se trata de un juego que requiere concentración y foco en los movimientos de la pelota, por lo que durante el partido no tendrás tiempo para pensar en nada más.
                        Las pistas de pádel brindan a los huéspedes una opción de entretenimiento y actividad física durante su estadía, complementando otras ofertas de ocio 
                        </p>
                    </div>
                    <div class="flex items-center justify-between space-x-4">
                        <img src="{{ asset('img/minipartida.jpg') }}" alt="Vestuarios modernos" class="w-1/3 rounded-lg shadow-md">
                        <p class="text-gray-800 dark:text-gray-300 flex-1 text-lg">
                        Amplias zonas verdes ideales para relajarte antes y después de tu juego.
                        Vestuarios modernos y equipados para tu comodidad.
                        Tienda y bar con terraza, ideales para disfrutar después de cada partida.
                        </p>
                    </div>
                    <div class="flex items-center justify-between space-x-4 flex-row-reverse">
                        <img src="{{ asset('img/asientoPadel.jpg') }}" alt="Tienda y bar" class="w-1/3 rounded-lg shadow-md">
                        <p class="text-gray-800 dark:text-gray-300 flex-1 text-lg">
                        Las pistas panorámicas o superpanorámicas son consideradas las mejores, ya que ofrecen una visión completa sin puntos ciegos, mayor amplitud y comodidad para los jugadores, 
                        además del prestigio que suponen al ser el mismo diseño que el utilizado en los principales torneos. 
                        En nuestro caso, llevamos muchos años utilizando el modelo Full Panoramic para torneos televisados, y actualmente el modelo Premier, una pista de edición limitada para Premier Padel hasta 2026.    
                    </p>
                    </div>
                </div>
            </section>
             <!-- Sección: Tienda -->
             <section>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-6">Tienda de Pádel</h2>
                <p class="text-center text-lg text-gray-800 dark:text-gray-300 mb-6">
                    Como Club Oficial Bullpadel, ofrecemos a nuestros socios y clientes las últimas novedades en palas, ropa, zapatillas y accesorios. 
                    ¡Obtén un <span class="font-semibold">10% de descuento</span> adicional si eres socio!
                </p>
                <div class="flex justify-center space-x-8">
                    <!-- Imagenes centradas con descripción -->
                    <div class="text-center">
                        <img src="{{ asset('img/raqueta.jpg') }}" alt="Palas de Pádel" class="w-40 h-40 rounded-lg shadow-md mx-auto">
                        <p class="text-gray-800 dark:text-gray-300 mt-2">Palas Bullpadel y pelotas</p>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/camiseta.jpg') }}" alt="Ropa deportiva" class="w-40 h-40 rounded-lg shadow-md mx-auto">
                        <p class="text-gray-800 dark:text-gray-300 mt-2">Ropa Deportiva</p>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/mochila.jpg') }}" alt="Zapatillas Bullpadel" class="w-40 h-40 rounded-lg shadow-md mx-auto">
                        <p class="text-gray-800 dark:text-gray-300 mt-2">Mochilas </p>
                    </div>
                </div>
            </section>

           <!-- Información adicional -->
<section>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-6">Tarifas y Bonos</h2>
    <p class="text-gray-800 dark:text-gray-300 text-center">
        Conoce nuestras tarifas para socios y no socios, y accede a bonos trimestrales con precios especiales. 
        Disfruta de las mejores instalaciones deportivas en Zaragoza.
    </p>

    <!-- Botón para realizar reserva -->
    <div class="text-center mt-6">
        <a href="{{ url('/calendar') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300">
            Realizar Reserva
        </a>
    </div>
</section>
        </div>
    </div>
</x-app-layout>
