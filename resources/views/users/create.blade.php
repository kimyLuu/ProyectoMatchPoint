@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f8ff;">
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <h2 class="text-center text-primary mb-4">Crear Nuevo Usuario</h2>
        
        <!-- Formulario -->
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="numero_socio" class="form-label">Número de Socio</label>
                <input type="text" name="numero_socio" id="numero_socio" class="form-control" 
                       value="{{ old('numero_socio') }}" placeholder="Ej: 12345">
            </div>
            
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" 
                       value="{{ old('name') }}" placeholder="Ej: Juan" required>
            </div>
            
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" name="surname" id="surname" class="form-control" 
                       value="{{ old('surname') }}" placeholder="Ej: Pérez">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" 
                       value="{{ old('email') }}" placeholder="Ej: usuario@email.com" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" 
                       placeholder="••••••••" required>
            </div>
            
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="guest" {{ old('role') === 'guest' ? 'selected' : '' }}>Invitado</option>
                    <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>Cliente</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control" 
                       value="{{ old('phone') }}" placeholder="Ej: +34 600 123 456">
            </div>
            
            <!-- Botón Guardar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100 py-2">Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    .btn-primary {
        background-color: #87ceeb; /* Celeste claro */
        color: #000; /* Letras negras */
        border: none;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #00bfff; /* Azul más intenso al pasar el cursor */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }

    .form-control, .form-select {
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .form-control:focus, .form-select:focus {
        border-color: #87ceeb;
        box-shadow: 0 0 5px rgba(135, 206, 235, 0.5);
    }

    h2 {
        font-weight: bold;
        color: #007bff;
    }
</style>
@endsection
