<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @else
            <div id="banner_vertical">
                <div class="imagen">
                    <img src="{{ asset('img/favicon .jpg') }}" alt="foto">
                </div>
                <h1>ORITRUCKS COMPANY</h1>
                <p class="Usuario_y_Paginas">USUARIO</p>
                <form action="{{ route('usuario.show') }}" method="GET">
                    <button>CONFIGURACION</button>
                </form>
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
                <form action="{{ route('valoracion.index') }}" method="GET">
                    <button>Valoraciones</button>
                </form>
                <button>Cerrar Sesión</button>
            </div>
            <div id="Titulo_y_tabla" style="text-align: center">
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