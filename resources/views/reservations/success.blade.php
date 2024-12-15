@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f8ff;">
    <div class="card shadow-lg p-4 text-center" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <h2 class="text-primary mb-4">Pago Exitoso</h2>

        <!-- Mensaje de confirmación -->
        <p class="mb-4" style="font-size: 18px;">
            🎉 La reserva ha sido confirmada.
        </p>

        <!-- Información de la reserva -->
        <ul class="list-unstyled text-center mb-4">
            <li class="mb-3">
                🏟️ <strong>Pista:</strong> {{ $reservation->court->name }}
            </li>
            <li class="mb-3">
                📅 <strong>Fecha:</strong> {{ $reservation->date }}
            </li>
            <li class="mb-3">
                ⏰ <strong>Hora:</strong> {{ $reservation->time }}
            </li>
            <li class="mb-3">
                ⏳ <strong>Duración:</strong> {{ $reservation->duration }} minutos
            </li>
        </ul>

        <!-- Botón de volver al inicio -->
        <a href="{{ route('dashboard') }}" class="btn w-100 py-2">Volver al Inicio</a>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
        color: #007bff; /* Azul llamativo */
    }

    p {
        font-size: 18px;
        color: #333;
    }

    ul {
        padding: 0;
        list-style: none;
    }

    ul li {
        font-size: 18px;
        line-height: 1.6;
    }

    .btn {
        background-color: #87ceeb; /* Celeste claro */
        color: #000; /* Letras negras */
        font-size: 16px;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #00bfff; /* Azul más intenso al pasar el cursor */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }
</style>
@endsection
