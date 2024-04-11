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
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        margin: 100px auto;
        padding: 20px;
        max-width: 500px;
      }

      form {
        text-align: center;
      }

      label {
        display: block;
        margin-bottom: 10px;
        color: #333;
        font-size: 16px;
        font-weight: bold;
      }

      input[type="text"],
      input[type="password"],
      input[type="email"],
      input[type="number"],
      input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
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
  <body>
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
