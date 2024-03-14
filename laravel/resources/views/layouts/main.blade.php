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
                <a href="{{ route('home.index') }}" onclick="esfera()">Home</a>
                @if (!session('usuario'))
                    <a href="{{ route('login.index') }}" onclick="esfera()">Entrar</a>
                @else
                    <a href="{{ route('loja.index') }}" onclick="esfera()">Loja</a>
                    <a href="{{ route('carrinho.index') }}" onclick="esfera()">Carrinho</a>
                    <a href="{{ route('login.deslogar') }}" onclick="esfera()">Sair</a>
                    <a href="{{ route('login.index') }}" onclick="esfera()" class="nome">{{ session('usuario')['name'] }}</a>
                @endif
            </nav>
        </header>

        <img src="imgs/goku.png"     alt="Goku voando" class="goku">
        <img src="imgs/shenlong.png" alt="Shenlong"    class="shenlong" style="display: none" onclick="shenlong()">
        <img src="imgs/esfera.png"   alt="Esfera"      class="esfera"   style="display: none">
        <img src="imgs/qrcode.jpeg"  alt="QrCode"      class="qrcode"   style="display: none" onclick="qrcode()">

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