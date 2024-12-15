@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Título principal -->
    <h1 class="text-center mb-4" style="font-size: 2.8rem; color: #007bff;">Listado de Reservas</h1>

    <!-- Botón para nueva reserva -->
    <div class="text-end mb-4">
        <a href="{{ route('reservations.create') }}" class="btn btn-primary" style="padding: 12px 25px; font-size: 1.3rem; background-color: #007bff; border: none; border-radius: 5px; transition: background-color 0.3s ease;">
            Nueva Reserva
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center" style="font-size: 1.1rem;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabla de reservas -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center" style="border-radius: 10px; overflow: hidden; width: 100%;">
            <thead class="table-dark">
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
                        <td style="font-size: 1.1rem;">{{ $reservation->user->name }}</td>
                        <td style="font-size: 1.1rem;">{{ $reservation->court->name }}</td>
                        <td style="font-size: 1.1rem;">{{ $reservation->date }}</td>
                        <td style="font-size: 1.1rem;">{{ $reservation->time }}</td>
                        <td style="font-size: 1.1rem;">{{ $reservation->duration }} minutos</td>
                        <td>
                            <span class="badge {{ $reservation->status === 'confirmed' ? 'bg-success' : 'bg-warning text-dark' }}" style="font-size: 1rem;">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </td>
                        <td class="d-flex justify-content-center gap-3">
                            <!-- Botón Editar -->
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning" style="border-radius: 5px; font-size: 1rem; transition: background-color 0.3s;">
                                Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="border-radius: 5px; font-size: 1rem; transition: background-color 0.3s;" onclick="return confirmDelete()">
                                    Eliminar
                                </button>
                            </form>
                            <!-- Botón Cancelar -->
                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('reservations.showCancel', $reservation->id) }}" class="btn btn-danger btn-sm">
                                    Cancelar
                                </a>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmación de eliminación -->
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar esta reserva? Esta acción no se puede deshacer.');
    }
</script>

<!-- Estilos personalizados -->
<style>
    .table {
        width: 100%;
        margin: 0 auto;
        font-size: 1rem;
    }

    .table th, .table td {
        padding: 11px 14px;
        vertical-align: middle;
    }

    .table th {
        font-size: 1.1rem;
        font-weight: bold;
        color: #ffffff;
        background-color: #343a40;
    }

    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 15px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning:hover {
        background-color: #ffc107;
        color: #000;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }
    .btn-secondary:hover {
        background-color: #007bff;
    }


    .badge {
        padding: 10px 15px;
        font-size: 0.9rem;
        border-radius: 10px;
    }

    h1 {
        font-size: 2.7rem;
        font-weight: bold;
        color: #007bff;
    }
</style>
@endsection
