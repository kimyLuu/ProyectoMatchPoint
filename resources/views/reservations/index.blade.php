@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Nueva Reserva</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Pista</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Duración</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->court->name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->duration }} minutos</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
