@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f8ff;">
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <h2 class="text-center text-primary mb-4">Editar Usuario</h2>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Número de Socio -->
            <div class="form-group mb-4">
                <label for="numero_socio" class="form-label">Número de Socio</label>
                <input type="text" name="numero_socio" id="numero_socio" class="form-control"
                       value="{{ old('numero_socio', $user->numero_socio) }}">
            </div>

            <!-- Nombre -->
            <div class="form-group mb-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" 
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Apellido -->
            <div class="form-group mb-4">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" name="surname" id="surname" class="form-control" 
                       value="{{ old('surname', $user->surname) }}">
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group mb-4">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" 
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Teléfono -->
            <div class="form-group mb-4">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control" 
                       value="{{ old('phone', $user->phone) }}">
            </div>

            <!-- Rol -->
            <div class="form-group mb-4">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Cliente</option>
                    <option value="guest" {{ $user->role === 'guest' ? 'selected' : '' }}>Invitado</option>
                </select>
            </div>

            <!-- Botón de guardar cambios -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100 py-2">Guardar Cambios</button>
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

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #87ceeb; /* Celeste claro */
        color: #000; /* Letras negras */
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #00bfff; /* Azul más intenso al pasar el cursor */
        box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
    }

    .alert-danger {
        background-color: #ffdddd;
        color: #d8000c;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
    }
</style>
@endsection
