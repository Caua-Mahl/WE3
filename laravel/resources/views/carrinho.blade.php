@extends('layouts.main')

@section('titulo', 'Carrinho')

@section('conteudo')
    <div class="carrinho">
        <h1>Carrinho</h1>

        @if (count(session('carrinho')) == 0)
            <h2>Carrinho vazio</h2>
        @else
        @foreach (session('carrinho') as $produto)
            <div class="produtoCarrinho">
                <div class="dadosCarrinho">
                    <h2>{{ $produto->nome }}</h2>
                    <div>
                        <p class="passagens">Passagens: {{ $produto->quantidade }}</p>
                        <p>Total: R$ {{ $produto->preco * $produto->quantidade }},00</p>
                    </div>
                </div>
                <div class="formCarrinho">
                    <form action="">
                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <input type="number" name="quantidade" value="{{ $produto->quantidade }}" class="quantidadeFinal">
                        <input type="submit" value="Atualizar" class="atualizarCarrinho">
                    </form>
                    <form action="{{ route('carrinho.remover') }}" method="post">
                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <input type="submit" value="Remover" class="removerCarrinho">
                    </form>
                </div>
            </div>
        @endforeach

            <div class="finalizar">
                <p>Total Do Carrinho: R$ {{ session('total') }},00</p>
                <button>Finalizar Compra</button>
            </div>
        @endif
    </div>
@endsection