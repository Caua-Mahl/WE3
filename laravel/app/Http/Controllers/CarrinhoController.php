<?php

namespace App\Http\Controllers;

use App\Models\User;

class CarrinhoController extends Controller
{
    public function index()
    {
        if (!session('usuario'))
            return redirect()->route('login.index')->with('erro', 'Você precisa estar logado para acessar o carrinho');

        session(['carrinho' => (json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho)]);
        return view('carrinho');
    }

    public function adicionar()
    {
        $carrinho = json_decode(User::where('name', session('usuario')->name)->first()->carrinho)->carrinho;
        $produto  = [
            'id'         => request('id'),
            'nome'       => request('nome'),
            'preco'      => request('preco'),
            'quantidade' => request('quantidade')
        ];

        if (count($carrinho) > 0) {
            if (array_search($produto['id'], array_column($carrinho, 'id')) !== false) {
                $indice = array_search($produto['id'], array_column($carrinho, 'id'));
                $carrinho[$indice]->quantidade += $produto['quantidade'];
            }
            else {
                array_push($carrinho, $produto);
            }
        }
        else {
            array_push($carrinho, $produto);
        }
        User::where('name', session('usuario')->name)->update(['carrinho' => json_encode(['carrinho' => $carrinho])]);
        return redirect()->route('loja.index')->with('sucess', 'Produto adicionado ao carrinho');
    }
}
