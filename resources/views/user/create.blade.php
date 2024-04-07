<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/styles.cliente.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="content">
      <img src="ruta/a/tu/imagen.jpg" alt="Descripción de la imagen" class="form-image">
      <form id="form_cliente" action="{{ route('cliente.store') }}" method="POST" enctype="multipart/form-data">
        <div class="form-container">
          <h1>Sign Up</h1>
          <p>Enter the data to register</p>
          <hr>
          <input type="text" placeholder="Nombre y apellidos" name="name" id="name" required>
          <input type="text" placeholder="Correo electrónico" name="email" id="email" required>
          <input type="tel" placeholder="123456789" id="phone" name="phone" pattern="[0-9]{9}" required>
          <input type="submit" value="Enviar" class="full-width">
        </div>
      </form>
    </div>
  </body>
</html>