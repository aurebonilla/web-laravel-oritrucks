<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css">
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
        <h2>ORITRUCKS COMPANY</h2>
        <p class="Usuario_y_Paginas">USUARIO</p>
        <button  >CONFIGURACION</button>
        <p class="Usuario_y_Paginas">PÁGINAS</p>
        <form action="{{ route('administradorUsuarios.index') }}" method="GET">
        <form action="{{ route('administradorUsuarios.index') }}" method="GET">
            <button>Usuarios</button>
        </form>
        <form action="{{ route('conductor.index') }}" method="GET" >
        <form action="{{ route('conductor.index') }}" method="GET" >
            <button>Conductores</button>
        </form>
        <form action="{{ route('viaje.index') }}" method="GET" >
        <form action="{{ route('viaje.index') }}" method="GET" >
            <button>Viajes</button>
        </form>
        <form action="{{ route('vehiculos.index') }}" method="GET">
        <form action="{{ route('vehiculos.index') }}" method="GET">
            <button>Vehiculos</button>
        </form>
        <button>Cerrar Sesión</button>
    </div>
    <div id="Titulo_y_tabla">
        <h1>Listado de Usuarios</h1>
        <table class="table">
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
        <div class="pagination">
             {{ $usuarios->links()}}
        </div>
    </div>
    
</body>
</html>
