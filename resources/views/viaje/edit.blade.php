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
    <form action="{{ route('viaje.update', $viaje->identificador) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="identificador">Identificador:</label>
        <input type="number" id="identificador" name="identificador" value="{{ $viaje->identificador }}">

        <label for="fecha">Fecha de Viaje:</label>
        <input type="date" id="fecha" name="fecha" value="{{ $viaje->fecha}}">

        <label for="duracion">Duracion:</label>
        <input type="number" id="duracion" name="duracion" value="{{ $viaje->duracion }}">

        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" value="{{ $viaje->origen }}">

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" value="{{ $viaje->destino }}">

        <label for="km">Km:</label>
        <input type="number" id="km" name="km" value="{{ $viaje->km }}">

        <label for="tarifa">Tarifa:</label>
        <input type="number" id="tarifa" name="tarifa" value="{{ $viaje->tarifa }}">

        <input type="submit" value="Modificar Viaje">
    </form>
</div>