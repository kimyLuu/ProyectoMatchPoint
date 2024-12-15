@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Indica que es una actualización -->

        <div class="mb-3">
            <label for="numero_socio" class="form-label">Número de Socio</label>
            <input type="text" name="numero_socio" id="numero_socio" class="form-control" 
                   value="{{ old('numero_socio', $user->numero_socio) }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" 
                   value="{{ old('surname', $user->surname) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" 
                   value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Cliente</option>
                <option value="guest" {{ $user->role === 'guest' ? 'selected' : '' }}>Invitado</option>
            </select>
        </div>

        

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
