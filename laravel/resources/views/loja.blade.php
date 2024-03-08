@extends('layouts.main')

@section('titulo', 'Loja')

@section('conteudo')

@if (session('sucess'))
    <p>{{ session('sucess') }}</p>
@endif

<h1>Loja</h1>

<h2>Produtos</h2>

@foreach ($produtos as $produto)
    <p>{{ $produto->dscproduto }} - R$ {{ $produto->preco }}</p>
@endforeach

@endsection