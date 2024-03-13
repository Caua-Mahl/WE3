<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <link href="css/app.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <a href="{{ route('home.index') }}" class="logo">
                <img src="imgs/dragao.png" alt="Shenlong Airlines Logo">
                <p>Shenlong Airlines</p>
            </a>
            <nav>
                <a href="{{ route('home.index') }}" onclick="goku()">Home</a>
                @if (!session('usuario'))
                    <a href="{{ route('login.index') }}" onclick="goku()">Entrar</a>
                @else
                    <a href="{{ route('loja.index') }}" onclick="goku()">Loja</a>
                    <a href="{{ route('carrinho.index') }}" onclick="goku()">Carrinho</a>
                    <a href="{{ route('login.deslogar') }}" onclick="goku()">Sair</a>
                    <a href="{{ route('login.index') }}" onclick="goku()" class="nome">{{ session('usuario')['name'] }}</a>
                @endif
            </nav>
        </header>

        <img src="imgs/goku.png"     alt="Goku voando" class="goku">
        <img src="imgs/shenlong.png" alt="Shenlong"    class="shenlong" style="display: none" onclick="shenlong()">

        <main class="conteudo">
            @yield('conteudo')
        </main>

        <footer>
            <p>SAC</p>
            <p>Política de Privacidade</p>
            <p>Política de Cookies</p>
            <p>Termo de Compra </p>
            <p class="direita" onclick="shenlong()">Desenvolvido por Cauã Mahl</p>
        </footer>
        <script src="/js/script.js"></script>
    </body>
</html>