<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Vehículo</title>
</head>
<body>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
<h1>Editar Vehículo</h1>
<form action="{{ route('vehiculos.update', $vehiculo->matricula) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="matricula">Matrícula:</label>
    <input type="text" id="matricula" name="matricula" value="{{ old('matricula', $vehiculo->matricula) }}">
    @if ($errors->has('matricula'))
        <div style="color: red;">{{ $errors->first('matricula') }}</div>
    @endif

    <label for="tipo">Tipo de Vehículo:</label>
    <select id="tipo" name="tipo">
        <option value="furgoneta" {{ (old('tipo', $vehiculo->tipo) == 'furgoneta') ? 'selected' : '' }}>Furgoneta</option>
        <option value="camion" {{ (old('tipo', $vehiculo->tipo) == 'camion') ? 'selected' : '' }}>Camión</option>
    </select>
    @if ($errors->has('tipo'))
        <div style="color: red;">{{ $errors->first('tipo') }}</div>
    @endif

    <button type="submit">Actualizar Vehículo</button>
</form>

</body>
</html>