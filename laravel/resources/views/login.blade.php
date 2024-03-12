@extends('layouts.main')

@section('titulo', 'Login')

@section('conteudo')
    @if (session('usuario'))
        <div class="deslogar">     
            <h1>Login</h1>
            <p>Olá, {{ session('usuario')->name }}!</p>
            <p>Você já está logado, deseja deslogar?</p>
            <a href="{{ route('login.deslogar') }}" onclick="aviao()">Logout</a>
        </div>
    @else
        <div class="logar">
            <h1>Login</h1>
            <form action="{{ route('login.logar') }}" method="post">
                @csrf
                @error('email')
                    <p style="color: red;">{{ $message }}</p> 
                @enderror

                @error('cpf')
                    <p style="color: red;">{{ $message }}</p> 
                @enderror
                
                <input type="text"     name="email" id="email" placeholder="E-mail">   
                <input type="password" name="cpf"   id="cpf"   placeholder="Cpf">
                <input type="submit"   value="Entrar" onclick="aviao()">
            </form>
        </div>
    @endif
@endsection