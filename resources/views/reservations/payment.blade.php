@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Realizar Pago</h2>
    <p><strong>Pista:</strong> {{ $reservation->court->name }}</p>
    <p><strong>Fecha:</strong> {{ $reservation->date }}</p>
    <p><strong>Hora:</strong> {{ $reservation->time }}</p>
    <p><strong>Duración:</strong> {{ $reservation->duration }} minutos</p>
    <p><strong>Precio:</strong> €{{ $price }}</p>

    <form action="{{ route('reservations.confirmPayment', $reservation->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Confirmar y Pagar</button>
    </form>
</div>
@endsection
