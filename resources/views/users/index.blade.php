@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">
    <h1 class="text-center mb-4 text-primary" style="font-size: 2.5rem;">Lista de Usuarios</h1>

    <!-- Botón para crear un nuevo usuario -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-lg btn-success px-4 py-2">
            <i class="fas fa-plus-circle"></i> Crear Usuario
        </a>
    </div>

    <!-- Tabla de usuarios -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center" style="font-size: 18px;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ $user->role }}</span>
                    </td>
                    <td>
                        <!-- Botón Ver -->
                        <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-primary mx-1" title="Ver">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <!-- Botón Editar -->
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning mx-1" title="Editar">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <!-- Botón Eliminar -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-1" title="Eliminar" onclick="return confirmDelete()">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Script de confirmación -->
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.');
    }
</script>

<!-- Estilos personalizados -->
<style>
    h1 {
        font-weight: bold;
        font-family: Arial, sans-serif;
    }

    .table {
        width: 100%;
        margin: 0 auto;
        font-size: 1rem;
    }

    .table th, .table td {
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table thead {
        background-color: #343a40;
        color: #fff;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 15px;
        transition: all 0.3s ease-in-out;
    }
    .table th {
        font-size: 1.1rem;
        font-weight: bold;
        color: #ffffff;
        background-color: #343a40;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning:hover {
        background-color: #d39e00;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        font-size: 18px;
    }

    .btn-success:hover {
        background-color: #218838;
        box-shadow: 0 0 10px rgba(33, 136, 56, 0.5);
    }

    .badge {
        padding: 5px 12px;
        font-size: 16px;
        border-radius: 10px;
    }
</style>
@endsection
