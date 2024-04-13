<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin: 100px auto;
            padding: 20px;
            max-width: 500px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .form-container form label {
            margin-bottom: 10px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .form-container form input,
        .form-container form select {
            margin-bottom: 20px;
            width: calc(100% - 22px); /* Width - padding */
            padding: 10px; /* Aumento del tamaño de fuente */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            font-size: 15px; /* Tamaño de fuente aumentado */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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
    <form action="{{ route('viaje.update', $viaje->identificador) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="fecha">Fecha de Viaje:</label>
        <input type="date" id="fecha" name="fecha" value="{{ $viaje->fecha }}">

        <label for="duracion">Duracion:</label>
        <input type="number" id="duracion" name="duracion" value="{{ $viaje->duracion }}">

        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" value="{{ $viaje->origen }}">

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" value="{{ $viaje->destino }}">

        <label for="km">Km:</label>
        <input type="number" id="km" name="km" value="{{ $viaje->km }}">

        <label for="tarifa">Tarifa:</label>
        <select id="tarifa" name="tarifa">
            <option value="ESTANDAR" {{ $viaje->tarifa == 'ESTANDAR' ? 'selected' : '' }}>Estandar</option>
            <option value="PREMIUM" {{ $viaje->tarifa == 'PREMIUM' ? 'selected' : '' }}>Premium</option>
        </select>

        <label for="vehiculo_id">Vehículo:</label>
        <select id="vehiculo_id" name="vehiculo_id">
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->matricula }}" {{ $viaje->vehiculo_id == $vehiculo->matricula ? 'selected' : '' }}>{{ $vehiculo->matricula }}</option>
            @endforeach
        </select>

        <label for="conductor_id">Conductor:</label>
        <select id="conductor_id" name="conductor_id">
            @foreach ($conductors as $conductor)
                <option value="{{ $conductor->dni }}" {{ $viaje->conductor_id == $conductor->dni ? 'selected' : '' }}>{{ $conductor->dni }}</option>
            @endforeach
        </select>

        <input type="submit" value="Modificar Viaje">
    </form>
</div>
</body>
</html>
