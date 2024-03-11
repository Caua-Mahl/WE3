@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')
    <div class="loja">
        @if (session('sucess'))
            <p>{{ session('sucess') }}</p>
        @endif

        <h1>Loja</h1>
        @foreach (session('produtos') as $produto)
            <div class="produtos"> 
                <p>{{ $produto->dscproduto }} - R$ {{ $produto->preco }}</p>
                <div class="detalhes" style="display: none;">
                    <p>{{ $produto->dscproduto }}</p>
                    <p>R$ {{ $produto->preco }},00</p>
                    <p>{{ $produto->dscinterna }}</p>
                    <a href="{{ route('loja.adicionar', ['id' => $produto->idproduto]) }}">Adicionar ao carrinho</a>
                    <p>{{ $produto->quantidade }}</p>
                    <a href="{{ route('loja.remover', ['id' => $produto->idproduto]) }}">Remover do carrinho</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection