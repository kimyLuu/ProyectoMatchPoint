@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="court_id">Pista:</label>
            <select name="court_id" id="court_id" class="form-control">
                @foreach ($courts as $court)
                    <option value="{{ $court->id }}" {{ $reservation->court_id == $court->id ? 'selected' : '' }}>
                        {{ $court->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $reservation->date }}">
        </div>
        <div class="form-group">
            <label for="time">Hora:</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ $reservation->time }}">
        </div>
        <div class="form-group">
            <label for="duration">Duración (min):</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ $reservation->duration }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
</div>
@endsection

