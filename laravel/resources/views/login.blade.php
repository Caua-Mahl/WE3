
@extends('layouts.main')

@section('titulo', 'Login')

@section('conteudo')

    <h1>Login</h1>

    @if (session('usuario'))
        <p>Bem vindo, {{ session('usuario')->name }}!</p>
        <p>Você já está logado</p>
        <a href="{{ route('login.deslogar') }}">deslogar</a>
    @else
        <form action="{{ route('login.logar') }}" method="post">
            @csrf

            @error('email')
                <p>{{ $message }}</p> 
            @enderror

            @error('cpf')
                <p>{{ $message }}</p>
            @enderror

            <input type="text"     name="email" id="email" placeholder="E-mail">   
            <input type="password" name="cpf"   id="cpf"   placeholder="Cpf">
            <input type="submit"  value="Entrar">
        </form>
    @endif

    <a href="{{ route('home.index') }}">Home</a>

@endsection