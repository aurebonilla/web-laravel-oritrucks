<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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
