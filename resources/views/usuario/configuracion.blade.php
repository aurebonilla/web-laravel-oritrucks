<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/img/fondo1.JPG');
            background-size: cover;
        }
        .container {
            display: flex;
            height: 100vh;
            width: 100%;
            align-items: center; /* Centra verticalmente */
            justify-content: center; /* Centra horizontalmente */
        }
        .banner, .info {
            background-color: white;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
        }
        .banner {
            width: 20%; /* Ajusta según necesites */
            height: auto;
        }
        .info {
            width: 70%; /* Ajusta según necesites */
            height: auto;
        }
    </style>
</head>
<body>
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @else
        <div class="banner">
            <div class="imagen">
                <img src="{{ asset('img/favicon .jpg') }}" alt="foto">
            </div>
            <h1>ORITRUCKS COMPANY</h1>
            <p class="Usuario_y_Paginas">USUARIO</p>
            <button  >CONFIGURACION</button>
            <p class="Usuario_y_Paginas">PÁGINAS</p>
            
            <form action="{{ route('administradorUsuarios.index') }}" method="GET">
                <button>Usuarios</button>
            </form>
            
            <form action="{{ route('conductor.index') }}" method="GET" >
                <button>Conductores</button>
            </form>
            
            <form action="{{ route('viaje.index') }}" method="GET" >
                <button>Viajes</button>
            </form>
            
            <form action="{{ route('vehiculos.index') }}" method="GET">
                <button>Vehiculos</button>
            </form>
            <button>Cerrar Sesión</button>
        </div>
        <div class="info">
            <h1>Información del Usuario</h1>
            <p><strong>Nombre de Usuario:</strong> {{ $usuario->nombre_usuario }}</p>
            <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
            <p><strong>Apellidos:</strong> {{ $usuario->apellidos }}</p>
            <p><strong>DNI:</strong> {{ $usuario->dni }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $usuario->fecha_nacimiento ? $usuario->fecha_nacimiento: 'No disponible' }}</p>
            <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
        </div>
    @endif
</div>
</body>
</html>