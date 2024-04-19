<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Viajes</title>
    <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div id="banner_vertical">
        <div class="imagen">
            <img src="{{ asset('img/favicon .jpg') }}" alt="foto">
        </div>
        <h2>ORITRUCKS COMPANY</h2>
        <p class="Usuario_y_Paginas">USUARIO</p>
        <form action="{{ route('usuario.show') }}" method="GET">
            <button>CONFIGURACION</button>
        </form>
        <p class="Usuario_y_Paginas">PÁGINAS</p>
        <form action="{{ route('administradorUsuarios.index') }}" method="GET">
            <button>Usuarios</button>
        </form>
        <form action="{{ route('conductor.index') }}" method="GET">
            <button>Conductores</button>
        </form>
        <form action="{{ route('viaje.index') }}" method="GET">
            <button>Viajes</button>
        </form>
        <form action="{{ route('vehiculos.index') }}" method="GET">
            <button>Vehiculos</button>
        </form>
        <button>Cerrar Sesión</button>
    </div>
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
    <div id="Titulo_y_tabla">
        <h1>Listado de Viajes</h1>
        <table class="table">
            <tr>
                <th>Identificador</th>
                <th>Fecha de viaje</th>
                <th>Duracion</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Km</th>
                <th>Tarifa</th>
                <th>Vehículo ID</th>
                <th>Conductor ID</th>
                <th>Acciones</th>
            </tr>
            @forelse ($viajes as $viaje)
            <tr>
                <td>{{ $viaje->identificador }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->duracion }}</td>
                <td>{{ $viaje->origen }}</td>
                <td>{{ $viaje->destino }}</td>
                <td>{{ $viaje->km }}</td>
                <td>{{ $viaje->tarifa }}</td>
                <td>{{ $viaje->vehiculo_id }}</td> <!-- Muestra el ID del vehículo -->
                <td>{{ $viaje->conductor_id }}</td> <!-- Muestra el ID del conductor -->
                <td>
                    <form action="/viaje/identificador/{{ $viaje->identificador }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Borrar</button>
                    </form>
                    <form action="/viaje/edit/{{ $viaje->identificador }}" method="GET" style="display: inline-block;">
                        <button type="submit" class="btn btn-modificar">Modificar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No existen Viajes en el Sistema</td>
            </tr>
            @endforelse
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <form action="/viaje/create" style="display: inline-block;">
                <button type="submit" class="btn btn-crear">Crear Viaje</button>
            </form>
            <div style="display: inline-block; vertical-align: top;">
                <button class="btn btn-filtrar" onclick="mostrarFiltros()">Filtrar</button>
                <div class="filtros-dropdown" id="filtros" style="display: none;">
                    <form action="{{ route('viaje.index') }}" method="GET">
                        <select name="tipo_filtro">
                            <option value="">Seleccionar filtro</option>
                            <option value="identificador">Identificador</option>
                            <option value="duracion">Duracion</option>
                            <option value="origen">Origen</option>
                            <option value="destino">Destino</option>
                            <option value="km">Km</option>
                            <option value="tarifa">Tarifa</option>
                            <option value="mayor">Mayor de ...</option>
                            <option value="menor">Menor de ...</option>
                        </select>
                        <input type="text" name="valor_filtro">
                        <button type="submit" class="btn btn-filtrar">Filtrar</button>
                    </form>
                </div>
            </div>
            <div style="display: inline-block; vertical-align: top;">
                <button class="btn btn-ordenar" onclick="mostrarOrden()">Ordenar</button>
                <div class="orden-dropdown" id="orden" style="display: none;">
                    <form action="{{ route('viaje.index') }}" method="GET">
                        <select name="orden">
                            <option value="">Seleccionar orden</option>
                            <option value="fecha_asc">Fecha (Menor a Mayor)</option>
                            <option value="fecha_desc">Fecha (Mayor a Menor)</option>
                            <option value="modificacion_asc">Última Modificación (Antiguo a Reciente)</option>
                            <option value="modificacion_desc">Última Modificación (Reciente a Antiguo)</option>
                            <option value="creacion_asc">Última Creación (Antiguo a Reciente)</option>
                            <option value="creacion_desc">Última Creación (Reciente a Antiguo)</option>
                        </select>
                        <button type="submit" class="btn btn-ordenar">Ordenar</button>
                    </form>
                </div>
                </div>
                <form action="{{ route('viaje.index') }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-refrescar">Refrescar</button>
                </form>
        </div>
    </table>
    <div class="pagination">
        {{ $viajes->links()}}
    </div>
</div>
</body>
</html>