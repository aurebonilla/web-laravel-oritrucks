<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>Editar Usuario</title>
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
        <form action="{{ route('usuarioCliente.update', $usuario->dni) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre_usuario">Nombre_Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">

            <label for="password">Contraseña:</label>
            <input type="text" id="password" name="password" value="{{ $usuario->password }}">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}">

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos}}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $usuario->email }}">
            
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" value="{{ $usuario->telefono }}">

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}">

            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" value="{{ $usuario->direccion }}">

            <input type="submit" value="Modificar Usuario">
        </form>
        </div>
    </body>
</html>