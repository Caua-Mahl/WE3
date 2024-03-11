<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login',  [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'logar'])->name('login.logar');
Route::get('/logout', [LoginController::class, 'deslogar'])->name('login.deslogar');

Route::get('/loja',            [LojaController::class, 'index'])->name('loja.index');
Route::post('/loja/adicionar', [LojaController::class, 'adicionar'])->name('loja.adicionar');

Route::get('/carrinho',            [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');


