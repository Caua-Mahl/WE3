@extends('layouts.main')

@section('titulo', 'Carrinho')

@section('conteudo')
<h1>Carrinho</h1>
<div class="carrinho">
    @if (count(session('carrinho')) == 0)
    <p>Carrinho vazio</p>
    @else
    @foreach (session('carrinho') as $produto)
        <div class="produto">
            <p>{{ $produto->nome }}</p>
            <p>Passagens: {{ $produto->quantidade }}</p>
            <p>Total: R$ {{ $produto->preco * $produto->quantidade }},00</p>
        </div>
    @endforeach
        <p>Total: R$ {{ session('total') }},00</p>
    @endif
</div>
@endsection