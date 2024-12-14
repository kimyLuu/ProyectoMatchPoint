@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="numero_socio">Número de Socio</label>
            <input type="text" name="numero_socio" id="numero_socio" class="form-control" value="{{ old('numero_socio', $user->numero_socio) }}">
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $user->surname) }}">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Rol</label>
            <select name="role" id="role" class="form-control" required>
                <option value="guest" {{ old('role', $user->role) === 'guest' ? 'selected' : '' }}>Invitado</option>
                <option value="client" {{ old('role', $user->role) === 'client' ? 'selected' : '' }}>Cliente</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>

    </form>
</div>
@endsection
