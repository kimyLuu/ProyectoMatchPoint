@extends('layouts.app')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<div class="container">
    <h1>Crear Reserva</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="court_id" class="form-label">Pista</label>
            <select name="court_id" id="court_id" class="form-select" required>
            <option value="">Seleccione una pista</option>   
            @foreach ($courts as $court)
                    <option value="{{ $court->id }}">{{ $court->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" 
                   value="{{ old('date', $selectedDate) }}" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Hora</label>
            <select name="time" id="time" class="form-select" required>
                @foreach ($timeSlots as $time)
                    <option value="{{ $time }}">{{ $time }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duración (minutos)</label>
            <select name="duration" id="duration" class="form-select" required>
            <option value="60">60 minutos (20€)</option>
                <option value="90">90 minutos (30€)</option>
                <option value="120">120 minutos (40€)</option>
            </select>
        </div>
      
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
