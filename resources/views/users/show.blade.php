@extends('layouts.app')

@section('title', 'Ver Usuario')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <ul>
        <li><strong>Nombre:</strong> {{ $user->name }}</li>
        <li><strong>Apellido:</strong> {{ $user->surname }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Rol:</strong> {{ ucfirst($user->role) }}</li>
        <li><strong>Teléfono:</strong> {{ $user->phone }}</li>
    </ul>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
