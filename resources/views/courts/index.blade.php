@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center text-primary mb-5">Gestión de Pistas</h1>

    <!-- Botón Nueva Pista -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('courts.create') }}" class="btn btn-success btn-lg px-5 py-2">
            <i class="fas fa-plus-circle"></i> Nueva Pista
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Tabla de pistas -->
    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-hover table-bordered text-center align-middle" style="font-size: 18px;">
                <thead class="table-primary">
                    <tr>
                        <th class="py-3">Nombre</th>
                        <th class="py-3">Estado</th>
                        <th class="py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courts as $court)
                        <tr>
                            <td class="py-2">{{ $court->name }}</td>
                            <td class="py-2">
                                <span class="badge bg-{{ $court->status === 'available' ? 'success' : 'danger' }}">
                                    {{ ucfirst($court->status) }}
                                </span>
                            </td>
                            <td class="py-2 d-flex justify-content-center gap-3">
                                <!-- Botón Editar -->
                                <a href="{{ route('courts.edit', $court->id) }}" 
                                   class="btn btn-warning btn-sm action-btn px-3 py-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('courts.destroy', $court->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn px-3 py-2" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar esta pista? Esta acción no se puede deshacer.');
    }
</script>

<!-- Estilos personalizados -->
<style>
    /* Botón Nueva Pista */
    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: none;
        font-size: 18px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        box-shadow: 0 0 10px rgba(33, 136, 56, 0.6);
    }

    /* Botones de acciones */
    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        font-size: 16px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        box-shadow: 0 0 10px rgba(224, 168, 0, 0.6);
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        font-size: 16px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        box-shadow: 0 0 10px rgba(200, 35, 51, 0.6);
    }

    /* Tabla */
    .table {
        border: 1px solid #e0e0e0;
        background-color: #fff;
        width: 100%;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd;
    }

    .table-primary {
        background-color: #e3f2fd;
        font-weight: bold;
    }

    /* Badges */
    .badge {
        font-size: 16px;
        padding: 8px 12px;
        border-radius: 10px;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    /* Acciones */
    .action-btn {
        padding: 8px 15px;
        font-size: 16px;
        transition: transform 0.3s ease-in-out;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    /* General */
    .card {
        border-radius: 10px;
    }

    .card-body {
        padding: 30px;
    }
</style>
@endsection
