@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numero_socio">Número de Socio</label>
            <input type="text" name="numero_socio" id="numero_socio" class="form-control" value="{{ old('numero_socio') }}">
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        
        <div class="form-group">
            <label for="role">Rol</label>
            <select name="role" id="role" class="form-control" required>
                <option value="guest" {{ old('role') === 'guest' ? 'selected' : '' }}>Invitado</option>
                <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>Cliente</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
