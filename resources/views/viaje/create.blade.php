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

        /* Banner Styles */
        #banner_vertical {
            text-align: center;
            color:white;
            width: 20%;
            background-color: #333;
            padding: 20px;
            margin-top: 100px;
            margin-left: 15px;
            margin-bottom: 120px;
            float: left; 
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            font-family: 'Roboto', sans-serif;
        }

        #banner_vertical .imagen {
            margin-bottom: 20px;
        }

        #banner_vertical img {
            width: 100px;
            height: auto;
            border-radius: 50%;
        }
    </style>
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">

<div id="banner_vertical">
    <div class="imagen">
        <img src="{{ asset('img/favicon.jpg') }}" alt="foto">
    </div>
    <h1>ORITRUCKS COMPANY</h1>
    <p class="Usuario_y_Paginas">USUARIO</p>
    <button>CONFIGURACION</button>
    <p class="Usuario_y_Paginas">PÁGINAS</p>
    <form action="{{ route('administradorUsuarios.index') }}" method="GET" style="display: inline-block;">
        <button>Usuarios</button>
    </form>
    <form action="{{ route('conductor.index') }}" method="GET" style="display: inline-block;">
        <button>Conductores</button>
    </form>
    <form action="{{ route('viaje.index') }}" method="GET" style="display: inline-block;">
        <button>Viajes</button>
    </form>
    <form action="{{ route('vehiculos.index') }}" method="GET" style="display: inline-block;">
        <button>Vehiculos</button>
    </form>
    <button>Cerrar Sesión</button>
</div>

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
    <form action="{{ route('viaje.store') }}" method="POST">
        @csrf
        <label for="fecha">Fecha de Viaje</label>
        <input type="date" id="fecha" name="fecha">

        <label for="duracion">Duración</label>
        <input type="number" id="duracion" name="duracion">

        <label for="origen">Origen</label>
        <input type="text" id="origen" name="origen">

        <label for="destino">Destino</label>
        <input type="text" id="destino" name="destino">

        <label for="km">Km</label>
        <input type="number" id="km" name="km">

        <label for="tarifa">Tarifa</label>
        <select id="tarifa" name="tarifa">
            <option value="ESTANDAR">Estandar</option>
            <option value="PREMIUM">Premium</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>

        <label for="vehiculo_id">Vehículo ID</label>
        <select id="vehiculo_id" name="vehiculo_id">
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->matricula }}">{{ $vehiculo->matricula }}</option>
            @endforeach
        </select>

        <label for="conductor_id">Conductor ID</label>
        <select id="conductor_id" name="conductor_id">
            @foreach ($conductors as $conductor)
                <option value="{{ $conductor->dni }}">{{ $conductor->dni }}</option>
            @endforeach
        </select>

        <input type="submit" value="Crear Viaje">
    </form>
</div>
</body>
</html>
