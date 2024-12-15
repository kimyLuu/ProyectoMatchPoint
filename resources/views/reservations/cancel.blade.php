@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <h2 class="text-center text-primary mb-4" style="font-size: 2rem;">Cancelar Reserva</h2>

        <!-- Información de la reserva -->
        <ul class="list-unstyled text-center mb-4">
            <li><strong>Pista:</strong> {{ $reservation->court->name }}</li>
            <li><strong>Fecha:</strong> {{ $reservation->date }}</li>
            <li><strong>Hora:</strong> {{ $reservation->time }}</li>
            <li><strong>Duración:</strong> {{ $reservation->duration }} minutos</li>
            <li><strong>Estado:</strong> 
                <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : 'secondary' }}">
                    {{ ucfirst($reservation->status) }}
                </span>
            </li>
        </ul>

        <p class="text-center mb-4">¿Está seguro de que desea cancelar esta reserva?</p>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between">
            <!-- Botón Cancelar Reserva -->
            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100" style="margin-right: 10px;">
                    <i class="fas fa-times-circle"></i> Cancelar Reserva
                </button>
            </form>

            <!-- Botón Atrás -->
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary w-100">
                <i class="fas fa-arrow-left"></i> Atrás
            </a>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    /* Títulos */
    h2 {
        font-weight: bold;
        font-family: Arial, sans-serif;
    }

    /* Tarjeta */
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    /* Botones */
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        box-shadow: 0 0 10px rgba(200, 35, 51, 0.5);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        box-shadow: 0 0 10px rgba(90, 98, 104, 0.5);
    }

    /* Lista */
    ul {
        font-size: 1.2rem;
    }

    /* General */
    .container {
        margin-top: 50px;
        max-width: 800px;
    }
</style>
@endsection
