<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Classes\Carrinho;

class CarrinhoController extends Controller {

    public function index() {
        if (!session('usuario'))
            return redirect()->route('login.index')->with('erro', 'Você precisa estar logado para acessar o carrinho');

        session(['carrinho' => (json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho)]);

        if (is_object(session('carrinho'))) {
            session(['carrinho' => (array) session('carrinho')]);
        }
        session(['total' => Carrinho::Total(session('carrinho'))]);

        return view('carrinho');
    }

    public function adicionar() {
        $carrinho = json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho;
        $produto  = [
            'id'         => request('id'),
            'nome'       => request('nome'),
            'preco'      => request('preco'),
            'quantidade' => request('quantidade')
        ];
        
        User::where('name', session('usuario')->name)
            ->update([
                'carrinho' => json_encode(['carrinho' => Carrinho::Adicionar($carrinho, $produto)])
            ]);

        return redirect()->route('loja.index')->with('sucess', 'Produto adicionado ao carrinho');
    }

    public function atualizar() {
        $carrinho = json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho;
        $produto  = [
            'id'         => request('id'),
            'quantidade' => request('quantidade')
        ];

        User::where('name', session('usuario')->name)
            ->update(['carrinho' => json_encode(['carrinho' => Carrinho::Atualizar($carrinho, $produto)])]);

        return redirect()->route('carrinho.index');
    }

    public function remover()
    {
        $carrinho = json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho;
        $produto  = [
            'id' => request('id')
        ];

        User::where('name', session('usuario')->name)
            ->update(['carrinho' => json_encode(['carrinho' => Carrinho::Remover($carrinho, $produto)])]);

        return redirect()->route('carrinho.index');
    }


}
