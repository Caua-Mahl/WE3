@extends('layouts.main')

@section('titulo', 'Home')

@section('conteudo')

<h1>Home</h1>

<a href="{{ route('login.index') }}">Login</a>

@endsection