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