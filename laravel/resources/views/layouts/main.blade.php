<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <a href="{{ route('home.index') }}" class="logo">Shenlong Airlines</a>
        <nav>
            <a href="{{ route('home.index') }}">Home</a>
            <a href="{{ route('login.index') }}">Login</a>
            <a href="{{ route('loja.index') }}">Loja</a>
        </nav>
    </header>
    <section>
        @yield('conteudo')
    </section>
</body>
</html>