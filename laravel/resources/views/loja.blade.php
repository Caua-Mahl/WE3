@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')
<div class="loja">
    <h1>Loja</h1>
    @foreach (session('produtos') as $produto)
    <div class="produtos" onclick="mostrarInfo(this)">
        <h2>{{ $produto->dscproduto }} - R$ {{ $produto->preco }},00</p>
            <div class="detalhes escondido" style="display: none;">
                <p>{{ $produto->dscinterna }}</p>
                <div class="carrinhoLoja">
                    <p class="maisMenos" onclick="adicionar()">+</p>
                    <p class="quantidade">{{$produto->quantidade }}</p>
                    <p class="maisMenos" onclick="remover()">-</p>
                </div>
                <form action="{{ route('carrinho.adicionar') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->idproduto }}">
                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                    <input type="hidden" name="nome" value="{{ $produto->dscproduto }}">
                    <input type="hidden" name="quantidade" value="pegarQuantidade()">
                    <button type="submit" class="maisMenos adicionar">Adicionar ao carrinho</button>
                </form>
            </div>
    </div>
    @endforeach
</div>
@endsection

<script>
    function mostrarInfo(div) {
        var escondido = div.getElementsByClassName("escondido");
        esconderTodas();
        escondido[0].style.display = "block";

    }

    function esconderTodas() {
        var divs = document.getElementsByClassName("escondido");
        for (var i = 0; i < divs.length; i++) {
            divs[i].style.display = "none";
        }
    }

    function adicionar() {
        var quantidade = document.getElementsByClassName("quantidade");
        quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) + 1;
    }

    function remover() {
        var quantidade = document.getElementsByClassName("quantidade");
        quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) - 1 > 0 ? parseInt(quantidade[0].innerHTML) - 1 : 0;
    }

    function pegarQuantidade() {
        var quantidade = document.getElementsByClassName("quantidade");
        return quantidade[0].innerHTML;
    }
</script>