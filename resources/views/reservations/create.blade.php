@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="court_id" class="form-label">Pista</label>
            <select name="court_id" id="court_id" class="form-select" required>
                @foreach ($courts as $court)
                    <option value="{{ $court->id }}">{{ $court->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Hora</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duración (minutos)</label>
            <select name="duration" id="duration" class="form-select" required>
                <option value="60">60</option>
                <option value="90">90</option>
                <option value="120">120</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending">Pendiente</option>
                <option value="confirmed">Confirmada</option>
                <option value="cancelled">Cancelada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
