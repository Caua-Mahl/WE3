@extends('layouts.main')

@section('titulo', 'Carrinho')

@section('conteudo')
    <section class="carrinho">
        <h1>Carrinho</h1>

        @if (count(session('carrinho')) == 0)
            <div class="vazio">
                <img src="{{ asset('imgs/carrinho_vazio.png') }}" alt="Carrinho vazio">
                <h2>Seu carrinho está vazio...</h2>
                <p>Entre na loja e adicione produtos ao seu carrinho!</p>
            </div>
        @else
            @foreach (session('carrinho') as $produto)
                <article class="produtoCarrinho">
                    <div class="dadosCarrinho">
                        <h2>{{ $produto->nome }}</h2>
                        <div>
                            <p>Valor unitário: R$ {{ number_format($produto->preco, 2, ",", ".") }}</p>
                            <p class="passagens">Passagens: {{ $produto->quantidade }}</p>
                            <p>Total: R$ {{ number_format($produto->preco * $produto->quantidade, 2, ",", ".") }}</p>
                        </div>
                    </div>
                    <div class="formCarrinho">
                        <form action="{{ route('carrinho.atualizar') }}" method="post">
                            @csrf
                            <button type="button"  class="maisMenos" onclick="remover(this.parentElement)">-</button>
                            <p      class="quantidade">1</p>
                            <button type="button"  class="maisMenos" onclick="adicionar(this.parentElement)">+</button>
                            <input  type="hidden"  name="id"         value="{{ $produto->id }}">
                            <input  type="hidden"  name="quantidade" value="1"  class="quantidadeFinal">
                            <input  type="submit"  value="Atualizar" class="atualizarCarrinho" onclick="esfera(); pegarQuantidade(this.parentElement)">
                        </form>
                        <form action="{{ route('carrinho.remover') }}" method="post" class="removerCarrinho"> 
                            @csrf
                            <input type="hidden" name="id"       value="{{ $produto->id }}">
                            <input type="submit" value="Remover" class="removerCarrinho" onclick="esfera()">
                        </form>
                    </div>
                </article>
            @endforeach

            <div class="finalizar">
                <h3>Total Do Carrinho: R$ {{ number_format(session('total'), 2, ",", ".") }}</p>
                <button onclick="qrcode()">Finalizar Compra</button>
                <form action="{{ route('carrinho.limpar') }}" method="post">
                    @csrf
                    <input type="submit" value="Limpar Carrinho" class="limparCarrinho" onclick="esfera()">
                </form>
            </div>
        @endif
    </section>
@endsection