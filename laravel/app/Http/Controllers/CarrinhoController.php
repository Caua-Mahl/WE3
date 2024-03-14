<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Classes\Carrinho;

class CarrinhoController extends Controller {

    public function index() {
        try {
            if (!session('usuario'))
                return redirect()->route('login.index')->with('erro', 'Você precisa estar logado para acessar o carrinho');

            session(['carrinho' => (json_decode(User::where('id', session('usuario')['id'])->first()->carrinho)->carrinho)]);

            if (is_object(session('carrinho'))) {
                session(['carrinho' => (array) session('carrinho')]);
            }
            session(['total' => Carrinho::Total(session('carrinho'))]);

            return view('carrinho');
        }
        catch (\Exception $e) {
            return redirect()->route('loja.index')->with('error', 'Erro ao acessar carrinho');
        }
    }

    public function atualizar() {
        try {
            $carrinho = json_decode(User::where('id', session('usuario')['id'])->first()->carrinho)->carrinho;
            $produto  = [
                'id'         => request('id'),
                'quantidade' => request('quantidade')
            ];
    
            User::where('id', session('usuario')['id'])
                ->update(['carrinho' => json_encode(['carrinho' => Carrinho::Atualizar($carrinho, $produto)])]);
    
            return redirect()->route('carrinho.index');  
        }   
        catch (\Exception $e) {
            return redirect()->route('carrinho.index')->with('error', 'Erro ao atualizar quantidade');
        }

    }

    public function remover() {
        try {
            $carrinho = json_decode(User::where('id', session('usuario')['id'])->first()->carrinho)->carrinho;
            $produto  = [
                'id' => request('id')
            ];

            User::where('id', session('usuario')['id'])
                ->update(['carrinho' => json_encode(['carrinho' => Carrinho::Remover($carrinho, $produto)])]);

            return redirect()->route('carrinho.index');
        }
        catch (\Exception $e) {
            return redirect()->route('carrinho.index')->with('error', 'Erro ao remover produto');
        }
    }

    public function limpar() {
        try {
            User::where('id', session('usuario')['id'])
                ->update(['carrinho' => json_encode(['carrinho' => []])]);

            return redirect()->route('carrinho.index');
        }
        catch (\Exception $e) {
            return redirect()->route('carrinho.index')->with('error', 'Erro ao limpar carrinho');
        }
    }

}
