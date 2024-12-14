@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pista</h1>
    <form action="{{ route('courts.update', $court->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $court->name }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select">
                <option value="available" {{ $court->status == 'available' ? 'selected' : '' }}>Disponible</option>
                <option value="occupied" {{ $court->status == 'occupied' ? 'selected' : '' }}>Ocupada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
