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
            <a href="{{ route('home.index') }}" class="logo">
                <img src="{{ asset('imgs/dragao.png') }}" alt="Shenlong Airlines Logo">
                <p>Shenlong Airlines</p>
            </a>
            <nav>
                <a href="{{ route('home.index') }}" onclick="aviao()">Home</a>
                <a href="{{ route('loja.index') }}" onclick="aviao()">Loja</a>

                @if (!session('usuario'))
                    <a href
                    ="{{ route('login.index') }}" onclick="aviao()">Entrar</a>
                @else
                    <a href="{{ route('carrinho.index') }}" onclick="aviao()">Carrinho</a>
                    <a href="{{ route('login.deslogar') }}" onclick="aviao()">Sair</a>
                    <a href="{{ route('login.index') }}" onclick="aviao()" class="nome">{{ session('usuario')->name }}</a>
                @endif
            </nav>
        </header>

        <img src="{{ asset('imgs/airplane.png') }}" alt="avião que voa na página" class="aviao">

        <section class="conteudo">
            @yield('conteudo')
        </section>

        <footer>
            <p>SAC</p>
            <p>Política de Privacidade</p>
            <p>Política de Cookies</p>
            <p>Termo de Compra </p>
            <p class="direita">Desenvolvido por Cauã Mahl</p>
        </footer>

        <script>
            function mostrarInfo(div) {
                var escondido = div.getElementsByClassName("escondido");
                var botao     = div.getElementsByClassName("info");
                var divs      = document.getElementsByClassName("produtos");

                if (escondido[0].style.display == "none") {
                    var divs = document.getElementsByClassName("produtos");

                    for (var i = 0; i < divs.length; i++) {
                        divs[i].style.display = "none";
                    }

                    div.style.display          = "block";
                    div.classList.remove("hover");
                    escondido[0].style.display = "block";
                } else {
                    for (var i = 0; i < divs.length; i++) {
                        divs[i].style.display = "block";
                    }

                    div.classList.add("hover");
                    escondido[0].style.display = "none";
                }
            }

            function adicionar(div) {
                var quantidade          = div.getElementsByClassName("quantidade");
                quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) + 1;
            }

            function remover(div) {
                var quantidade          = div.getElementsByClassName("quantidade");
                quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) - 1 > 1 ? parseInt(quantidade[0].innerHTML) - 1 : 1;
            }

            function pegarQuantidade(div) {
                div.getElementsByClassName("quantidadeFinal")[0].value = div.getElementsByClassName("quantidade")[0].innerHTML;
            }

            function aviao() {
                document.getElementsByClassName("aviao")[0].style.display = "block";
            }

            function modalidade($modalidade) {
                var divs = document.getElementsByClassName("produtos");

                if ($modalidade == 0) {
                    for (var i = 0; i < divs.length; i++) {
                        divs[i].style.display = "block";
                    }
                    return;
                }

                for (var i = 0; i < divs.length; i++) {
                    divs[i].classList.contains($modalidade) ? divs[i].style.display = "block" : divs[i].style.display = "none";
                }
            }

        </script>
    </body>
</html>