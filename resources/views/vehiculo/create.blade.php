<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Vehículo</title>
    <style>
        .form-container {
            display: flex;
            flex-direction: column;  /* Cambiado de 'row' a 'column' */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container form input, .form-container form select {
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
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
        <label for="matricula">Matrícula:</label>
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