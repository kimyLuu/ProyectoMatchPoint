@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f8ff;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 800px; border-radius: 10px;">
        <h2 class="text-center mb-4 text-primary">Realizar Pago</h2>

        <!-- Imagen pequeña  -->
        <div class="text-center mb-4">
            <img src="{{ asset('img/Pagar.jpg') }}" alt="Pago" class="img-fluid" style="max-width: 380px; height: 250px; border-radius: 10px;">
        </div>

        <!-- Información de la reserva con iconos -->
        <ul class="list-unstyled text-center">
            <li class="mb-3">
                <i class="fas fa-map-marker-alt text-primary"></i>
                <strong>Pista:</strong> {{ $reservation->court->name }}
            </li>
            <li class="mb-3">
                <i class="fas fa-calendar-alt text-primary"></i>
                📅 <strong>Fecha:</strong> {{ $reservation->date }}
            </li>
            <li class="mb-3">
                <i class="fas fa-clock text-primary"></i>
                ⏰ <strong>Hora:</strong> {{ $reservation->time }}
            </li>
            <li class="mb-3">
                <i class="fas fa-hourglass-half text-primary"></i>
                ⏳<strong>Duración:</strong> {{ $reservation->duration }} minutos
            </li>
            <li class="mb-3">
                <i class="fas fa-euro-sign text-primary"></i>
                💶 <strong>Precio:</strong> €{{ $price }}
            </li>
        </ul>

        <!-- Botón de confirmación y pago -->
        <form action="{{ route('reservations.confirmPayment', $reservation->id) }}" method="POST" class="text-center mt-4">
            @csrf
            <button type="submit" class="btn w-100 py-2">Confirmar y Pagar</button>
        </form>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    .btn {
        background-color: #87ceeb; /* Celeste claro */
        color: #000; /* Letras negras */
        font-size: 16px;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        background-color: #00bfff; /* Azul más intenso al pasar el cursor */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }

    h2 {
        color: #007bff; /* Color azul llamativo */
    }
    ul {
        padding: 0;
    }

    i {
        margin-right: 8px; /* Espaciado entre icono y texto */
    }
    ul li {
        font-size: 18px;
        line-height: 1.6;
    }

    img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        
    }
</style>

@endsection
