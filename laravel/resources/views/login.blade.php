@extends('layouts.main')

@section('titulo', 'Login')

@section('conteudo')
    @if (session('usuario'))
        <section class="deslogar">     
            <h1>Login</h1>
            <p>Olá, {{ session('usuario')['name'] }}!</p>
            <p>Você já está logado, deseja deslogar?</p>
            <a href="{{ route('login.deslogar') }}" onclick="esfera()">Logout</a>
        </section>
    @else
        <section class="logar">
            <h1>Login</h1>
            <form action="{{ route('login.logar') }}" method="post">
                @csrf
                @error('email')
                    <p style="color: red;">{{ $message }}</p> 
                @enderror

                @error('cpf')
                    <p style="color: red;">{{ $message }}</p> 
                @enderror
                
                <input type="text"      name="email" id="email" placeholder="E-mail">   
                <input type="password"  name="cpf"   id="cpf"   placeholder="Cpf">
                <div class="lembrar">
                    <label for="lembrar">Lembrar de mim:</label>
                    <input type="checkbox" name="lembrar" id="lembrar">
                </div>
                <input type="submit"   value="Entrar" onclick="esfera()">
            </form>
            <div class="outros">
                    <a>Esqueci a senha</a>
                    <a>Não tenho conta</a>
            </div>
        </section>
    @endif
@endsection