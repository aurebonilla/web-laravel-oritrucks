<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container form {
        display: flex;
        flex-direction: column;
    }
    .form-container form input {
        margin-bottom: 1em;
    }
</style>

<div class="form-container">
    <form action="{{ route('conductor.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="carnet">Carnet:</label>
        <input type="text" id="carnet" name="carnet">

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono">

        <input type="submit" value="Crear Conductor">
    </form>
</div>