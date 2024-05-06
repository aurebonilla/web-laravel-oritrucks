<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Valoración</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script>
        window.onload = function() {
            document.getElementById('puntuacion').oninput = function() {
                document.getElementById('puntuacionValor').textContent = parseFloat(this.value).toFixed(1);
            };
        };
    </script>
</head>
<body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div class="form-container">
    <form action="{{ route('valoracion.update', $valoracion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="puntuacion">Puntuación:</label>
            <input type="range" id="puntuacion" name="puntuacion" min="0" max="5" step="0.5" required value="{{ $valoracion->puntuacion }}">
            <span id="puntuacionValor">3</span>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" style="margin-bottom: 10px; text-align:center;" name="comentario" rows="15" cols = "65">{{ $valoracion->comentario }}</textarea>

            <input type="submit" value="Modificar Valoración">
        </form>
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
    </div>
</body>
</html>