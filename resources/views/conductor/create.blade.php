<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Conductores</title>
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container form {
        display: flex;
        flex-direction: column;
    }
    .form-container form input {
        margin-bottom: 1em;
    }
</style>

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
    <form action="{{ route('conductor.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="carnet">Carnet:</label>
        <input type="text" id="carnet" name="carnet">

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono">

        <input type="submit" value="Crear Conductor">
    </form>
</div>
</body>
</html>