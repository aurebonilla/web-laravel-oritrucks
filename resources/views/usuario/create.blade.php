<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/signup.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="imagen">
    <img src="{{ asset('img/furgoneta1.jpeg') }}" alt="Descripción de la imagen" class="form-image">
    </div>
    <div class="form-container">
      <div class="signup-box">
        <h2>Sign Up</h2>
        <p>Por favor, rellene este formulario para crear una cuenta.</p>
      </div>
      <div class="content">
      <form method="POST" action="{{ route('usuario.store') }}">
        @csrf
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">
        <button class="register-button" type="submit">
         Registrarse
        </button>
    </form>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger error-box">
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