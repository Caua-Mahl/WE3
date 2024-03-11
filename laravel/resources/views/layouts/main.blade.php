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
            <a href="{{ route('loja.index') }}">Loja</a>
            @if (!session('usuario'))
            <a href="{{ route('login.index') }}">Entrar</a>
            @else
            <a href="{{ route('carrinho.index') }}">Carrinho</a>
            <a href="{{ route('login.deslogar') }}">Sair</a>
            <a href="{{ route('login.index') }}" class="nome">{{ session('usuario')->name }}</a>
            @endif
        </nav>
    </header>
    <section>
        @yield('conteudo')
    </section>
</body>

</html>