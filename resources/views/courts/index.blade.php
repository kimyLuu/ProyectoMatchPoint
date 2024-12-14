@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Pistas</h1>
    <a href="{{ route('courts.create') }}" class="btn btn-primary mb-3">Nueva Pista</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courts as $court)
                <tr>
                    <td>{{ $court->name }}</td>
                    <td>{{ $court->status }}</td>
                    <td>
                        <a href="{{ route('courts.edit', $court->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('courts.destroy', $court->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()" >Eliminar</button>
                           
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar esta Pista? Esta acción no se puede deshacer.');
    }
</script>
@endsection
