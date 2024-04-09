<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #banner_vertical {
            text-align: center;
            color:white;
            width: 20%;
            background-color: #000;
            padding: 20px;
            margin-top: 200px;
            margin-left: 15px;
            margin-bottom: 120px;
            float: left; 
            border-radius: 25px;
            font-size: 30px;
        }

        #banner_vertical button {
            display: block;
            width: 100%;
            padding: 50px;
            margin-bottom: 5px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 23px;
        }

        #banner_vertical button:hover {
            background-color: #555;
        }

        #Titulo_y_tabla {
            width: 70%;
            margin-top: 200px;
            margin-bottom: 20px;
            margin-left: 150px;
            border-radius: 10px;
            float: left; /* Agregado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            
        }

        .usuarios-table {
            width: 80%;
            margin: 25px auto;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            
        }

        .usuarios-table th,
        .usuarios-table td {
            padding: 12px 15px;
        }

        .usuarios-table th {
            background-color: #f93e3e;
            color: #ffffff;
            text-align: left;
        }

        .usuarios-table tr {
            border-bottom: 1px solid #dddddd;
        }

        .usuarios-table tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .usuarios-table tr:last-of-type {
            border-bottom: 2px solid #f93e3e;
        }

        .usuarios-table tr.active-row {
            font-weight: bold;
            color: #f93e3e;
        }

        .btn-delete {
            background-color: #f93e3e;
            padding: 10px;
            color: #fff;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-modificar{
            background-color: #4CAF50;
            padding: 10px;
            color: #fff;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        h1 {
            width: 70%;
            color: white;
            text-align: center;
            padding: 10px;
            background-color: #f93e3e; 
            margin: 0 auto; 
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 20px; 
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); 
        }

    </style>
</head>
<script>
    function mostrarFiltros() 
    {
        var filtros = document.getElementById('filtros');
        var orden = document.getElementById('orden');
        if (filtros.style.display === 'none') {
            filtros.style.display = 'block';
            orden.style.display = 'none';
        } else {
            filtros.style.display = 'none';
        }
    }

    function mostrarOrden() 
    {
        var orden = document.getElementById('orden');
        var filtros = document.getElementById('filtros');
        if (orden.style.display === 'none') {
            orden.style.display = 'block';
            filtros.style.display = 'none';
        } else {
            orden.style.display = 'none';
        }
    }
</script>
<body>
    <div id="banner_vertical">
        <div>ORITRUCKS COMPANY</div>
        <div>USUARIO</div>
        <button>CONFIGURACION</button>
        <div>PAGINAS</div>
        <button>Clientes</button>
        <button>Conductores</button>
        <button>Viajes</button>
        <button>Vehiculos</button>
        <button>Cerrar Sesion</button>
    </div>
    <div id="Titulo_y_tabla">
        <h1>Listado de Usuarios</h1>
        <table class="usuarios-table">
            <tr>
                <th>Nombre_Usuario</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
            @forelse ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre_usuario }}</td>    
                <td>{{ $usuario->password }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellidos }}</td>
                <td>{{ $usuario->dni }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->fecha_nacimiento }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>
                    <form action="/usuarios/email/{{ $usuario->email }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">  Borrar</button>
                    </form>
                    <form action="{{ route('administradorUsuarios.edit', ['dni' => $usuario->dni]) }}" method="GET" style="display: inline-block;">
                        <button type="submit" class="btn btn-modificar" >Modificar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No existen Usuarios en el Sistema</td>
            </tr>
            @endforelse

            <div style="text-align: center; margin-top: 20px;">

                <form action="{{ route('administradorUsuarios.create') }}" style="display: inline-block;">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </form>
                
                <div style="display: inline-block; vertical-align: top;">
                <button onclick="mostrarFiltros()">Filtrar</button>
                    <div id="filtros" style="display: none;">
                    <form action="{{ route('administradorUsuarios.index') }}" method="GET">
                        <select name="tipo_filtro">
                            <option value="">Seleccionar filtro</option>
                            <option value="nombre_usuario">Nombre_Usuario</option>
                            <option value="nombre">Nombre</option>
                            <option value="apellidos">Apellido</option>
                            <option value="dni">DNI</option>  
                            <option value="email">Email</option>
                            <option value="telefono">Teléfono</option>
                            <option value="direccion">Direccion</option>
                            <option value="mayor">Mayor de ...</option>
                            <option value="menor">Menor de ...</option>
                        </select>
                        <input type="text" name="valor_filtro">
                        <button type="submit">Filtrar</button>
                    </form>
                    </div>
                </div>
                <div style="display: inline-block; vertical-align: top;">
                    <button onclick="mostrarOrden()">Ordenar</button>
                        <div id="orden" style="display: none;">
                            <form action="{{ route('administradorUsuarios.index') }}" method="GET">
                                <select name="orden">
                                    <option value="">Seleccionar orden</option>
                                    <option value="edad_asc">Edad (Menor a Mayor)</option>
                                    <option value="edad_desc">Edad (Mayor a Menor)</option>
                                    <option value="modificacion_asc">Última Modificación (Antiguo a Reciente)</option>
                                    <option value="modificacion_desc">Última Modificación (Reciente a Antiguo)</option>
                                    <option value="creacion_asc">Última Creación (Antiguo a Reciente)</option>
                                    <option value="creacion_desc">Última Creación (Reciente a Antiguo)</option>
                                </select>
                                <button type="submit">Ordenar</button>
                            </form>
                        </div>
                </div>
                    <form action="{{ route('administradorUsuarios.index') }}" method="GET" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary">Refrescar</button>
                    </form>
            </div>
        </table>
    </div>
</body>
</html>

