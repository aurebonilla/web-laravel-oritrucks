<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Valoraciones</title>
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

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
        <h1>Listado de Valoraciones</h1>
    <table class="table">
        <tr>
            <th>Viaje</th>
            <th>Usuario</th>
            <th>Valoración</th>
            <th>Comentario</th>
            <th>Acciones</th>
        </tr>
        @forelse ($valoraciones as $valoracion)
        <tr>
            <td>{{ $valoracion->viaje_id }}</td>
            <td>{{ $valoracion->usuario_dni }}</td>
            <td>{{ $valoracion->puntuacion }}</td>
            <td>{{ $valoracion->comentario }}</td>
            <td>
            <form action="{{ route('valoracion.destroy', $valoracion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-delete">Borrar</button>
                </form>
                <form action="{{ route('valoracion.edit', $valoracion->id) }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-modificar">Modificar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No existen Valoraciones en el Sistema</td>
        </tr>
        @endforelse

        <div style="text-align: center; margin-top: 20px;">
            <form action="/valoracion/create" style="display: inline-block;">
                <button type="submit" class="btn btn-crear">Crear Valoración</button>
            </form>
            <div style="display: inline-block; vertical-align: top;">
            <button class="btn btn-filtrar" onclick="mostrarFiltros()">Filtrar</button>
                <div class="filtros-dropdown" id="filtros" style="display: none;">
                <form action="{{ route('valoracion.index') }}" method="GET">
                    <select name="tipo_filtro">
                        <option value="">Seleccionar filtro</option>
                        <option value="viaje">Viaje</option>
                        <option value="usuario">Usuario</option>
                        <option value="mayor">Por encima de ...</option>
                        <option value="menor">Por bajo de ...</option>
                    </select>
                    <input type="text" name="valor_filtro">
                    <button type="submit">Filtrar</button>
                </form>
                </div>
            </div>
            <div style="display: inline-block; vertical-align: top;">
                <button class="btn btn-ordenar" onclick="mostrarOrden()">Ordenar</button>
                    <div class="orden-dropdown" id="orden" style="display: none;">
                        <form action="{{ route('valoracion.index') }}" method="GET">
                            <select name="orden">
                                <option value="">Seleccionar orden</option>
                                <option value="punt_asc">Valoración (Menor a Mayor)</option>
                                <option value="punt_desc">Valoración (Mayor a Menor)</option>
                                <option value="modificacion_asc">Última Modificación (Antiguo a Reciente)</option>
                                <option value="modificacion_desc">Última Modificación (Reciente a Antiguo)</option>
                                <option value="creacion_asc">Última Creación (Antiguo a Reciente)</option>
                                <option value="creacion_desc">Última Creación (Reciente a Antiguo)</option>
                            </select>
                            <button type="submit">Ordenar</button>
                        </form>
                    </div>
            </div>
                <form action="{{ route('valoracion.index') }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-refrescar">Refrescar</button>
                </form>
        </div>
    </table>
    <div class="pagination">
        {{ $valoraciones->links()}}
    </div>
</div>
</body>
</html>