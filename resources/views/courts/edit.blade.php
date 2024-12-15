@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <h2 class="text-center mb-4 text-primary">Editar Pista</h2>
        
        <!-- Formulario -->
        <form action="{{ route('courts.update', $court->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    value="{{ $court->name }}" 
                    required
                    style="border-radius: 5px; border: 1px solid #ced4da;">
            </div>
            
            <!-- Campo Estado -->
            <div class="mb-4">
                <label for="status" class="form-label">Estado</label>
                <select 
                    name="status" 
                    id="status" 
                    class="form-select" 
                    style="border-radius: 5px; border: 1px solid #ced4da;">
                    <option value="available" {{ $court->status == 'available' ? 'selected' : '' }}>Disponible</option>
                    <option value="occupied" {{ $court->status == 'occupied' ? 'selected' : '' }}>Ocupada</option>
                </select>
            </div>
            
            <!-- Botón Actualizar -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="btn w-100 py-2 text-white" 
                    style="background-color: #007bff; border: none; border-radius: 5px; transition: background-color 0.3s ease, box-shadow 0.3s ease;">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .btn:hover {
        background-color: #0056b3; /* Azul más intenso */
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
@endsection
