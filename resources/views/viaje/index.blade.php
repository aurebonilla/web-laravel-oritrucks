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

<h1>Listado de Viajes</h1>

<table class="viajes-table">
    <tr>
        <th>Identificador</th>
        <th>Fecha de viaje</th>
        <th>Duracion</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Km</th>
        <th>Tarifa</th>
        <th>Acciones</th>
    </tr>
    @foreach ($viajes as $viaje)
    <tr>
        <td>{{ $viaje->identificador }}</td>
        <td>{{ $viaje->fecha }}</td>
        <td>{{ $viaje->duracion }}</td>
        <td>{{ $viaje->origen }}</td>
        <td>{{ $viaje->destino }}</td>
        <td>{{ $viaje->km }}</td>
        <td>{{ $viaje->tarifa }}</td>
        <td>
            <form action="/viaje/identificador/{{ $viaje->identificador }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            <form action="/viaje/edit/{{ $viaje->identificador }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </td>
    </tr>
    @endforeach

    <div style="text-align: center; margin-top: 20px;">
        <form action="/viaje/create" style="display: inline-block;">
            <button type="submit" class="btn btn-primary">Crear Viaje</button>
        </form>
    </div>
</table>