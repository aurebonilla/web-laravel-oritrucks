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
            width: 15%;
            background-color: #333;
            padding: 20px;
            margin-top: 100px;
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

        #banner_vertical .Usuario_y_Paginas {
            font-family: 'Segoe UI',sans-serif;
            font-size: 28px;
            font-weight: bold;
            color: white; 
            color: white; 
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 5px 0;

        }
        #banner_vertical button {
            display: block;
            width: 100%; 
            padding: 20px;
            margin: 5px auto;
            background-color: #007bff; 
            width: 100%; 
            padding: 20px;
            margin: 5px auto;
            background-color: #007bff; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
            margin-bottom: 25px;
        }

        #banner_vertical button:hover {
            background-color: #0056b3;
        }
        
        
        #Titulo_y_tabla {
            width: 70%;
            margin-top: 107px;
            margin-bottom: 20px;
            margin-left: 75px;
            margin-right: 75px;
            border-radius: 10px;
            float: left; /* Agregado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            background-color: white;
            
        }

        h1 {
                    width: 80%;
                    width: 80%;
                    color: white;
                    text-align: center;
                    padding: 10px;
                    background-color: #007bff; 
                    margin: 0 auto; 
                    border-radius: 10px;
                    margin-top: 20px;
                    margin-bottom: 20px; 
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); 
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
            background-color: #007bff;
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
        .btn-delete:hover {
            background-color: #f81c1c;
        }
        .btn-crear,
        .btn-filtrar,
        .btn-ordenar,
        .btn-refrescar,
        .btn-modificar{
            background-color: #5aa4f7;
            padding: 10px;
            color: #fff;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-crear:hover,
        .btn-filtrar:hover,
        .btn-ordenar:hover,
        .btn-refrescar:hover,
        .btn-modificar:hover {
            background-color: #0056b3;
        }

        .filtros-dropdown,
        .orden-dropdown{
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
            border-radius: 5px;
        }

        .filtros-dropdown a,
        .orden-dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .filtros-dropdown a:hover,
        .orden-dropdown a:hover {
            background-color: #ddd;
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
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div id="banner_vertical">
        <div class="imagen">
            <img src="{{ asset('img/favicon .jpg') }}" alt="foto">
        </div>
        <h1>ORITRUCKS COMPANY</h1>
        <p class="Usuario_y_Paginas">USUARIO</p>
        
        <button>CONFIGURACION</button>
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
    <div id="Titulo_y_tabla">
        <h1>Listado de Usuarios</h1>
        <table class="usuarios-table">
            <tr>
                <th>Nombre_Usuario</th>
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
                    <button type="submit" class="btn btn-crear">Crear Usuario</button>
                </form>
                
                <div style="display: inline-block; vertical-align: top;">
                <button class="btn btn-filtrar" onclick="mostrarFiltros()">Filtrar</button>
                    <div class="filtros-dropdown" id="filtros">
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
                        <button class="btn btn-filtrar" type="submit">Filtrar</button>
                    </form>
                    </div>
                </div>
                <div style="display: inline-block; vertical-align: top;">
                    <button class="btn btn-ordenar" onclick="mostrarOrden()">Ordenar</button>
                        <div class="orden-dropdown" id="orden" >
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
                                <button type="submit" class="btn btn-ordenar">Ordenar</button>
                            </form>
                        </div>
                </div>
                    <form action="{{ route('administradorUsuarios.index') }}" method="GET" style="display: inline-block;">
                        <button type="submit"class="btn btn-refrescar">Refrescar</button>
                    </form>
            </div>
        </table>
    </div>
</body>
</html>
