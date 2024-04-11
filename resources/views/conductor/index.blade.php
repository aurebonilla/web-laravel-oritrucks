<style>
    .conductores-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 1em;
    }
    .conductores-table th, .conductores-table td {
        text-align: center;
        padding: 0.5em;
    }
</style>

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

<h1>Listado de Conductores</h1>

<table class="conductores-table">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Carnet</th>
        <th>Fecha de Nacimiento</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    @forelse ($conductores as $conductor)
    <tr>
        <td>{{ $conductor->dni }}</td>
        <td>{{ $conductor->nombre }}</td>
        <td>{{ $conductor->apellidos }}</td>
        <td>{{ $conductor->email }}</td>
        <td>{{ $conductor->carnet }}</td>
        <td>{{ $conductor->fecha_nacimiento }}</td>
        <td>{{ $conductor->telefono }}</td>
        <td>
            <form action="/conductor/email/{{ $conductor->email }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            <form action="/conductor/edit/{{ $conductor->dni }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8">No existen Conductores en el Sistema</td>
    </tr>
    @endforelse

    <div style="text-align: center; margin-top: 20px;">
        <form action="/conductor/create" style="display: inline-block;">
            <button type="submit" class="btn btn-primary">Crear Conductor</button>
        </form>
        <div style="display: inline-block; vertical-align: top;">
        <button onclick="mostrarFiltros()">Filtrar</button>
            <div id="filtros" style="display: none;">
            <form action="{{ route('conductor.index') }}" method="GET">
                <select name="tipo_filtro">
                    <option value="">Seleccionar filtro</option>
                    <option value="dni">DNI</option>
                    <option value="nombre">Nombre</option>
                    <option value="apellidos">Apellido</option>
                    <option value="email">Email</option>
                    <option value="carnet">Carnet</option>
                    <option value="telefono">Teléfono</option>
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
                    <form action="{{ route('conductor.index') }}" method="GET">
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
            <form action="{{ route('conductor.index') }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-primary">Refrescar</button>
            </form>
    </div>
</table>