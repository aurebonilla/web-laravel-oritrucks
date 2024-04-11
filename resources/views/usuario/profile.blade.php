<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/styles.usuario.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container">
        <h1>Usuario creado</h1>
        <hr>
          <b>Usuario:</b> {{$usuario->nombre_usuario}}
          <br>
          <b>Nombre:</b> {{$usuario->nombre}}
          <br>
          <b>Apellidos:</b> {{$usuario->apellidos}}
          <br>
          <b>DNI:</b> {{$usuario->dni}}
          <br>
          <b>Correo electrónico:</b> {{$usuario->email}}
          <br>
          <b>Teléfono:</b> {{$usuario->telefono}}
          <br>
          <b>Fecha de Nacimiento:</b> {{$usuario->fecha_nacimiento}}
          <br>
          <b>Dirección:</b> {{$usuario->direccion}}
      </div>
  </body>
</html>