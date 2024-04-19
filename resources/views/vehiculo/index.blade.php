<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vehículos</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
<div id="banner_vertical">
        <div class="imagen">
            <img src="{{ asset('img/favicon .jpg') }}" alt="foto">
        </div>
        <h2>ORITRUCKS COMPANY</h2>
        <p class="Usuario_y_Paginas">USUARIO</p>
        <form action="{{ route('usuario.show') }}" method="GET">
            <button>CONFIGURACION</button>
        </form>
        <p class="Usuario_y_Paginas">PÁGINAS</p>
        <form action="{{ route('administradorUsuarios.index') }}" method="GET">
            <button>Usuarios</button>
        </form>
        <form action="{{ route('conductor.index') }}" method="GET">
            <button>Conductores</button>
        </form>
        <form action="{{ route('viaje.index') }}" method="GET">
            <button>Viajes</button>
        </form>
        <form action="{{ route('vehiculos.index') }}" method="GET">
            <button>Vehiculos</button>
        </form>
        <button>Cerrar Sesión</button>
    </div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id="Titulo_y_tabla" style="text-align: center; margin-top: 20px;">
            <h1>Listado de Vehiculos</h1>
    <a href="{{ route('vehiculo.create') }}"><button type="submit" class="btn btn-crear">Crear Vehículo</button></a>

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
        <button type="submit" class="btn btn-filtrar">Filtrar</button>
    </form>

    <table class="table">
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
                        <button type="submit" class="btn btn-delete">Borrar</button>
                    </form>
                    <a href="{{ route('vehiculos.edit', $vehiculo->matricula) }}"><button type="submit" class="btn btn-modificar">Modificar</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>