@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')
<div class="loja">
    <h1>Loja</h1>

    @if (session('sucess'))
        <p class="sucesso" style="color: green;">{{ session('sucess') }}</p>
    @endif

    @foreach (session('produtos') as $produto)
        <div class="produtos">
            <h2 class="info" onclick="mostrarInfo(this.parentElement)">
                {{ $produto->dscproduto }} - R$ {{ $produto->preco }},00
            </h2>
            <div class="detalhes escondido" style="display: none;">
                <p>{{ $produto->dscinterna }}</p>
                <form action="{{ route('carrinho.adicionar') }}" method="post">
                    @csrf
                    <div class="carrinhoLoja">
                        <p class="maisMenos" onclick="remover(this.parentElement)">-</p>
                        <p class="quantidade">1</p>
                        <p class="maisMenos" onclick="adicionar(this.parentElement)">+</p>
                    </div>
                    <input type="hidden" name="id" value="{{ $produto->idproduto }}">
                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                    <input type="hidden" name="nome" value="{{ $produto->dscproduto }}">
                    <input type="hidden" name="quantidade" value="1" class="quantidadeFinal">
                    <button type="submit" class="maisMenos adicionar" onclick="pegarQuantidade(this.parentElement)">Adicionar ao Carrinho</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
