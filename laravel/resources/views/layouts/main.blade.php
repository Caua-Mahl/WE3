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
                escondido[0].style.display = "block";
            }
            else {
                for (var i = 0; i < divs.length; i++) {
                    divs[i].style.display  = "block";
                }

                escondido[0].style.display = "none";
            }
        }
        
        function adicionar(div) {
            var quantidade = div.getElementsByClassName("quantidade");
            quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) + 1;
        }

        function remover(div) {
            var quantidade = div.getElementsByClassName("quantidade");
            quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) - 1 > 1 ? parseInt(quantidade[0].innerHTML) - 1 : 1;
        }

        function pegarQuantidade(div) {
            div.getElementsByClassName("quantidade")[0].innerHTML;
            div.getElementsByClassName("quantidadeFinal")[0].value = div.getElementsByClassName("quantidade")[0].innerHTML;
        }

        function carregar(div) {
            var inputs = div.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].style.display = "none";
            }  
            div.getElementsByClassName("carregar")[0].style.display = "block";
            div.getElementsByTagName("form")[0].style.display = "flex";

            //amanhã na imply tentar usando a classe logar
        }
    </script>
</body>
</html>