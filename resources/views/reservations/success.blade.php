@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pago Exitoso</h2>
    <p>La reserva ha sido confirmada.</p>
    <ul>
        <li><strong>Pista:</strong> {{ $reservation->court->name }}</li>
        <li><strong>Fecha:</strong> {{ $reservation->date }}</li>
        <li><strong>Hora:</strong> {{ $reservation->time }}</li>
        <li><strong>Duración:</strong> {{ $reservation->duration }} minutos</li>
    </ul>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>
</div>
@endsection
