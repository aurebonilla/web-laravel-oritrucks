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
        <!--<label for="identificador">Identificador:</label>
        <input type="number" id="identificador" name="identificador">-->

        <label for="fecha">Fecha de Viaje:</label>
        <input type="date" id="fecha" name="fecha">

        <label for="duracion">Duracion:</label>
        <input type="number" id="duracion" name="duracion">

        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen">

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino">

        <label for="km">Km:</label>
        <input type="number" id="km" name="km">

        <label for="tarifa">Tarifa:</label>
        <select id="tarifa" name="tarifa">
            <option value="ESTANDAR">Estandar</option>
            <option value="PREMIUM">Premium</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>

        <label for="vehiculo_id">Vehículo:</label>
        <select id="vehiculo_id" name="vehiculo_id">
            @foreach ($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->matricula }}">{{ $vehiculo->matricula }}</option>
            @endforeach
        </select>
        <!--  Los usuarios podrán seleccionar un vehículo y un conductor de las listas -->
        <label for="conductor_id">Conductor:</label>
        <select id="conductor_id" name="conductor_id">
            @foreach ($conductors as $conductor)
                <option value="{{ $conductor->dni }}">{{ $conductor->dni }}</option>
            @endforeach
        </select>

        <input type="submit" value="Crear Viaje">
    </form>
</div>