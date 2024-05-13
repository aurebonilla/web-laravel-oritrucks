<!DOCTYPE html>
    <html lang="en"></html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('css/showValoracion.css') }}">
    </head>

    <body style="background-image: url('/img/fondo1.JPG'); background-size: cover; background-position: center;">
    <div class="container-valoracion">
        <div class="card-valoracion">
            <h1>Valoración del Viaje</h1>
            <hr>
            @if($valoracion = $viaje->valoraciones->first())
                <div class="card-header-valoracion">
                    <span style="color: #cc6600;">Identificador del viaje:</span> {{ $viaje->identificador }}
                    <br>
                    <span style="color: #cc6600;">DNI del usuario:</span> {{ $valoracion->usuario_dni }}
                </div>
                <div class="card-body-valoracion">
                    <h5 class="card-title" style="color: #3366ff;font-size: 18px; ">Puntuación:</h5>
                    <p class="card-text">{{ $valoracion->puntuacion }}</p>
                    <h5 class="card-title" style="color: #3366ff;font-size: 18px; ">Comentario:</h5>
                    <p class="card-text">{{ $valoracion->comentario }}</p>
                </div>
            @else
                <p>No hay valoraciones para este viaje.</p>
            @endif
            <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-valoracion">Atrás</a>
            </div>
        </div>
    </div>
    </body>
</html>