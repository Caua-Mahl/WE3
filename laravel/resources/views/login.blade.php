@extends('layouts.main')

@section('titulo', 'Login')

@section('conteudo')

<h1>Login</h1>

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

<a href="{{ route('home.index') }}"></a>

@endsection