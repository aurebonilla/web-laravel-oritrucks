<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
<h1>Información del Usuario</h1>
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
    <form action="{{ route('usuarioCliente.store') }}" method="POST">
        @csrf
        <label for="fecha">Fecha de Viaje</label>
        <input type="date" id="fecha" name="fecha">

        <label for="duracion">Duración</label>
        <input type="number" id="duracion" name="duracion">

        <label for="origen">Origen</label>
        <input type="text" id="origen" name="origen">

        <label for="destino">Destino</label>
        <input type="text" id="destino" name="destino">

        <label for="km">Km</label>
        <input type="number" id="km" name="km">

        <label for="tarifa">Tarifa</label>
        <select id="tarifa" name="tarifa">
            <option value="ESTANDAR">Estandar</option>
            <option value="PREMIUM">Premium</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>

        <label for="vehiculo_id">Vehículo ID</label>
        <select id="vehiculo_id" name="vehiculo_id">
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->matricula }}">{{ $vehiculo->matricula }}</option>
            @endforeach
        </select>

        <label for="conductor_id">Conductor ID</label>
        <select id="conductor_id" name="conductor_id">
            @foreach ($conductors as $conductor)
                <option value="{{ $conductor->dni }}">{{ $conductor->dni }}</option>
            @endforeach
        </select>

        <input type="submit" value="Crear Viaje">
    </form>
</div>
</body>
</html>

