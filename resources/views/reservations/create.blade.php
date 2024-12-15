@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 50px;">
    <div class="card shadow-lg p-4 w-100" style="max-width: 600px; border-radius: 10px;">
        <h2 class="text-center mb-4 text-primary">Crear Reserva</h2>

        <!-- Mensajes de error -->
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="court_id" class="form-label">Pista</label>
                <select name="court_id" id="court_id" class="form-select" required>
                    <option value="" disabled selected>Seleccione una pista</option>   
                    @foreach ($courts as $court)
                        <option value="{{ $court->id }}">{{ $court->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" name="date" id="date" class="form-control" 
                       value="{{ old('date', $selectedDate) }}" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Hora</label>
                <select name="time" id="time" class="form-select" required>
                    <option value="" disabled selected>Seleccione un horario</option>
                    @foreach ($timeSlots as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duración</label>
                <select name="duration" id="duration" class="form-select" required>
                    <option value="60">60 minutos (20€)</option>
                    <option value="90">90 minutos (30€)</option>
                    <option value="120">120 minutos (40€)</option>
                </select>
            </div>

            <!-- Botón guardar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-100 py-2">Guardar Reserva</button>
            </div>
        </form>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .container {
        margin-top: 50px; /* Ajusta la distancia desde la parte superior */
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

     /* Botón guardar con estilo celeste claro */
     .btn {
        background-color: #87ceeb; /* Celeste claro */
        border: none;
        font-size: 16px;
        color: #fff;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        background-color: #00bfff; /* Azul más intenso al pasar el cursor */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }

    .card {
        background-color: #f8f9fa;
    }
</style>
@endsection
