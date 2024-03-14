@extends('layouts.main')

@section('titulo', 'Home')

@section('conteudo')
    <section class="home">
        <h1>Seja bem-vindo à Shenlong Airlines, a melhor companhia aérea do mundo!</h1>
        <article class="sobre">
            <h2>Sobre:</h2>
            <p>
                A Shenlong Airlines está presente em mais de 125 países, com uma vasta gama de opções para viagens áereas. 
                Desde nossa fundação em 2003, acreditamos que inovar é transformar novas ideias em realidade para fazer a 
                diferença no mundo. Contamos com alto padrão de conforto, além de atendimento online 24h. Nossa frota conta 
                com os aviões mais confiáveis para garantir a segurança de nossos passageiros.
            </p>
        </article>
        <img src="imgs/aeroporto.jpg" alt="Aeroporto" class="aeroporto">
    </section>
@endsection