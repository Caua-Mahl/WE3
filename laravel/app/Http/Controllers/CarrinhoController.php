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
        $usuario = session('usuario');
        return var_dump($usuario);

        $carrinho = json_decode(User::where('id', session('usuario')->id)->first()->carrinho);
        return print_r($carrinho);

        for ($i = 0; $i < count($carrinho); $i++) {
            if ($carrinho[$i]->id == request('id')) {
                $carrinho[$i]->quantidade += request('quantidade');
            }
        }

        User::where('id', session('usuario')->id)->update(['carrinho' => json_encode([])]);

        return redirect()->route('loja.index');
    }
}
