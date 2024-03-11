<?php

namespace App\Http\Controllers;

use App\Models\User;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho');
    }

    public function adicionar()
    {
        $carrinho = json_decode(User::where('name', session('usuario')->name)->first()->carrinho);
        for ($i = 0; $i < count($carrinho); $i++) {
            if ($carrinho[$i]->id == request('id')) {
                $carrinho[$i]->quantidade += request('quantidade');
            } else {
                $carrinho[] = [
                    'id'         => request('id'),
                    'nome'       => request('nome'),
                    'preco'      => request('preco'),
                    'quantidade' => request('quantidade')
                ];
            }
        }
        return print_r($carrinho);
        User::where('id', session('usuario')->id)->update(['carrinho' => json_encode(['carrinho' => $carrinho])]);

        return redirect()->route('loja.index');
    }
}
