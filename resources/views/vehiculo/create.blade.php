<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Vehículo</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
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

<div class="form-container">
    <h2 style="text-align: center;">Crear Vehículo</h2>
    <form action="{{ route('vehiculo.store') }}" method="POST">
        @csrf
        <label for="nombre">Matrícula:</label>
        <input type="text" id="matricula" name="matricula">

        <label for="tipo">Tipo de Vehículo:</label>
        <select id="tipo" name="tipo">
            <option value="furgoneta">Furgoneta</option>
            <option value="camion">Camión</option>
        </select>

        <input type="submit" value="Crear Vehículo">
    </form>
    <a href="{{ route('vehiculos.index') }}"><button type="button">Volver al Listado de Vehículos</button></a>
</div>
</body>
</html>