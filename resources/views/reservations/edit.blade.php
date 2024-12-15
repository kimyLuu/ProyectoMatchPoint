@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center text-primary mb-5" style="font-size: 2.5rem;">Editar Reserva</h1>

    <!-- Mensajes de error y éxito -->
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; border-radius: 10px;">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="court_id" class="form-label">Pista:</label>
                    <select name="court_id" id="court_id" class="form-select" required>
                        @foreach ($courts as $court)
                            <option value="{{ $court->id }}" {{ $reservation->court_id == $court->id ? 'selected' : '' }}>
                                {{ $court->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="date" class="form-label">Fecha:</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ $reservation->date }}" required>
                </div>

                <div class="mb-4">
                    <label for="time" class="form-label">Hora:</label>
                    <input type="time" name="time" id="time" class="form-control" value="{{ $reservation->time }}" required>
                </div>

                <div class="mb-4">
                    <label for="duration" class="form-label">Duración (min):</label>
                    <input type="number" name="duration" id="duration" class="form-control" value="{{ $reservation->duration }}" required>
                </div>

                <!-- Botones de acción -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    /* Título */
    h1 {
        font-weight: bold;
        font-family: Arial, sans-serif;
    }

    /* Contenedor */
    .container {
        max-width: 900px;
        margin: auto;
    }

    /* Tarjeta del formulario */
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    /* Botón principal */
    .btn-primary {
        background-color: #87ceeb; /* Celeste claro */
        color: #000; /* Letras negras */
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #00bfff; /* Azul más intenso */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }

    /* Botón de cancelar */
    .btn-secondary {
        background-color: #d6d6d6;
        color: #000;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        font-size: 16px;
    }

    .btn-secondary:hover {
        background-color: #bfbfbf;
        box-shadow: 0 0 10px rgba(191, 191, 191, 0.5);
    }

    /* Inputs */
    .form-control, .form-select {
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .form-control:focus, .form-select:focus {
        border-color: #87ceeb;
        box-shadow: 0 0 5px rgba(135, 206, 235, 0.5);
    }
</style>

<!-- Script para evitar conflictos de horario -->
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const time = document.getElementById('time').value;
        const date = document.getElementById('date').value;

        // Simulación de comprobación de conflicto (esto debe ser manejado en el backend)
        const isConflict = false; // Aquí debes consultar en el backend.

        if (isConflict) {
            event.preventDefault();
            alert('Ya existe una reserva para esta pista en la misma fecha y hora. Por favor, elige otro horario.');
        }
    });
</script>
@endsection
