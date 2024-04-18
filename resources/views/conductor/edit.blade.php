<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Conductores</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div class="form-container">
        <form action="{{ route('conductor.update', $conductor->dni) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $conductor->nombre }}">

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ $conductor->apellidos}}">

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="{{ $conductor->dni }}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $conductor->email }}">

            <label for="carnet">Carnet:</label>
            <input type="text" id="carnet" name="carnet" value="{{ $conductor->carnet }}">

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $conductor->fecha_nacimiento }}">

            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" value="{{ $conductor->telefono }}">

            <input type="submit" value="Modificar Conductor">
        </form>
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
    </div>
</body>
</html>