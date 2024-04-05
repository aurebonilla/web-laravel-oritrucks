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
    @foreach ($conductores as $conductor)
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
    @endforeach

    <div style="text-align: center; margin-top: 20px;">
        <form action="/conductor/create" style="display: inline-block;">
            <button type="submit" class="btn btn-primary">Crear Conductor</button>
        </form>
    </div>
</table>