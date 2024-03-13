@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')
    <div class="loja">
        <h1>Loja</h1>
        
        @if (session('sucess'))
            <p class="sucesso"> {{ session('sucess') }} </p>
        @endif

        <div class="modalidade">
            <button type="button" class="maisMenos" onclick="modalidade(0)">Todos</button>
            <button type="button" class="maisMenos" onclick="modalidade(1)">Ocidente</button>
            <button type="button" class="maisMenos" onclick="modalidade(2)">Oriente</button>
        </div>
        
        @foreach (session('produtos') as $produto)
            <div class="produtos hover {{$produto->modalidade }}">
                <h2 class="info" onclick="mostrarInfo(this.parentElement)">
                    {{ $produto->dscproduto }} - R$ {{ number_format($produto->preco, 2, ",", ".") }}
                </h2>
                <div class="detalhes escondido" style="display: none;">
                    <img src="{{ asset('imgs/' . $produto->imagem) }}" alt="imagem do produto">
                    <p>{{ $produto->dscinterna }}</p>
                    <form action="{{ route('carrinho.adicionar') }}" method="post">
                        @csrf
                        <div class="carrinhoLoja">
                            <button type="button" class="maisMenos" onclick="remover(this.parentElement)">-</button>
                            <p class="quantidade">1</p>
                            <button type="button" class="maisMenos" onclick="adicionar(this.parentElement)">+</button>
                        </div>
                        <input  type="hidden"  name="id"         value="{{ $produto->idproduto }}">
                        <input  type="hidden"  name="preco"      value="{{ $produto->preco }}">
                        <input  type="hidden"  name="nome"       value="{{ $produto->dscproduto }}">
                        <input  type="hidden"  name="quantidade" value="1"  class="quantidadeFinal">
                        <button type="submit"  class="maisMenos adicionar"  onclick="pegarQuantidade(this.parentElement);  goku()">Adicionar passagens ao Carrinho</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
