
@extends('layouts.main')

@section('titulo', 'Login')

@section('conteudo')
    @if (session('usuario'))
        <div class="deslogar">     
            <h1>Login</h1>
            <p>Olá, {{ session('usuario')->name }}!</p>
            <p>Você já está logado, deseja deslogar?</p>
            <a href="{{ route('login.deslogar') }}">Logout</a>
        </div>
    @else
        <div class="logar">
            <h1>Login</h1>
            <form action="{{ route('login.logar') }}" method="post">
                @csrf
                @error('email')
                    <p>{{ $message }}</p> 
                @enderror

                @error('cpf')
                    <p>{{ $message }}</p>
                @enderror
                <div class="carregar" style="display: none;"></div>
                <input type="text"     name="email" id="email" placeholder="E-mail">   
                <input type="password" name="cpf"   id="cpf"   placeholder="Cpf">
                <input type="submit"   value="Entrar" onclick="carregar(this.parentElement)">
            </form>
        </div>
    @endif
@endsection

<script>
    function carregar(div) {
        var inputs = div.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.display = "none";
        }  
        div.getElementsByClassName("carregar")[0].style.display = "block";
        div.getElementsByTagName("form")[0].style.display = "flex";

        //amanhã na imply tentar usando a classe logar
    }
</script>