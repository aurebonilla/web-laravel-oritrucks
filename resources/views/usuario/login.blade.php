<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body>
        <form method="POST" action="{{ route('usuario.login') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">
                Log in
            </button>
        </form>
        <a href="{{ route('usuario.create') }}" class="button">Registrarse</a>
    </body>
</html>