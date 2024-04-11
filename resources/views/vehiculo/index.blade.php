<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vehículos</title>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Listado de Vehículos</h1>

<a href="{{ route('vehiculo.create') }}"><button>Crear Vehículo</button></a>

<!-- Filtros para mostrar los vehiculos -->
<form method="GET" action="{{ route('vehiculos.index') }}">
    <input type="text" name="matricula" placeholder="Buscar por matrícula" value="{{ request('matricula') }}">
    <select name="tipo">
        <option value="">Todos los tipos</option>
        <option value="furgoneta" {{ request('tipo') == 'furgoneta' ? 'selected' : '' }}>Furgoneta</option>
        <option value="camion" {{ request('tipo') == 'camion' ? 'selected' : '' }}>Camión</option>
    </select>
    <select name="orden">
        <option value="asc" {{ request('orden') == 'asc' ? 'selected' : '' }}>Ascendente</option>
        <option value="desc" {{ request('orden') == 'desc' ? 'selected' : '' }}>Descendente</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehiculos as $vehiculo)
        <tr>
            <td>{{ $vehiculo->matricula }}</td>
            <td>{{ $vehiculo->tipo }}</td>
            <td>
                <form action="{{ route('vehiculos.destroy', $vehiculo->matricula) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <a href="{{ route('vehiculos.edit', $vehiculo->matricula) }}"><button>Modificar</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>