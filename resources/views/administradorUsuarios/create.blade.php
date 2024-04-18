<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
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
      <form action="{{ route('administradorUsuarios.store') }}" method="POST">
        @csrf
        <label for="nombre_usuario">Usuario</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario">

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos">

        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        
        <label for="telefono">Teléfono</label>
        <input type="number" id="telefono" name="telefono">

        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion">

        <input type="submit" value="Crear Usuario">
      </form>
    </div>
  </body>
</html>
